<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use App\Models\VoucherModel;
use App\Models\PembayaranModel;

class Order extends BaseController
{
    protected $transaksiModel, $transaksiDetailModel, $voucherModel, $pembayaranModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
        $this->voucherModel = new VoucherModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Riwayat Order | Recaka',
            'content_header' => 'Riwayat Order',
            'orders' => $this->transaksiModel
                // ->join('members', 'transaksi.member_id = members.id')
                // ->join('vouchers', 'transaksi.voucher_id = vouchers.id')
                ->where('transaksi.member_id', $id)
                ->orderBy('tanggal_transaksi', 'DESC')->findAll()
        ];

        return view('frontend/orders', $data);
    }

    public function order_details($kode_transaksi)
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Detail Order | Recaka',
            'content_header' => 'Detail Order',
            'orders' => $this->transaksiModel->select('kode_transaksi, nama_member, tanggal_transaksi, catatan, keterangan, pembayaran.status, foto_bukti_pembayaran, total, kode_voucher, voucher_id, diskon')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('vouchers', 'transaksi.voucher_id = vouchers.id', 'left')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->where('transaksi.member_id', $id)
                ->where('transaksi.kode_transaksi', $kode_transaksi)
                ->orderBy('tanggal_transaksi', 'DESC')->findAll(),
            'order_details' => $this->transaksiDetailModel
                ->join('transaksi', 'transaksi_detail.transaksi_kode = transaksi.kode_transaksi')
                ->where('transaksi.member_id', $id)
                ->where('transaksi_kode', $kode_transaksi)->findAll()
        ];

        return view('frontend/order_details', $data);
    }

    public function uploadBuktiBayar()
    {
        $transaksi_kode = $this->request->getPost('transaksi_kode');
        $img = $this->request->getFile('foto_bukti_pembayaran');

        if ($img->getError() == 4) {
            dd('error');
            $newName = 'default.png';
        } else {
            $newName = $img->getRandomName();
            $img->move('uploads', $newName);
        }

        $data = [
            'foto_bukti_pembayaran' => $newName,
            'status' => null,
        ];

        $this->pembayaranModel->where('transaksi_kode', $transaksi_kode)->set($data)->update();
        return redirect()->back();
    }


    public function applyVoucher()
    {
        $kode_transaksi = $this->request->getPost('kode_transaksi');
        $kode_voucher = $this->request->getPost('kode_voucher');

        // Ambil voucher_id berdasarkan kode_voucher
        $voucher = $this->voucherModel->where('kode_voucher', $kode_voucher)->first();

        if (!$voucher) {
            // Handle error jika kode voucher tidak ditemukan
            return redirect()->back()->withInput()->with('error', 'Kode voucher tidak valid.');
        }

        $data = [
            'voucher_id' => $voucher['id'],
        ];

        // Update voucher_id di transaksi berdasarkan kode_transaksi
        $this->transaksiModel->where('kode_transaksi', $kode_transaksi)->set($data)->update();
        return redirect()->back()->with('message', 'Voucher applied successfully.');



        // Update the voucher and note
        $this->transaksiModel->where('kode_transaksi', $kode_transaksi)->set($data)->update();

        // Provide feedback to the user
        return redirect()->back()->with('message', 'Voucher and Note updated successfully');
    }

    public function addNote()
    {
        $kode_transaksi = $this->request->getPost('kode_transaksi');
        // $memberId = session()->get('id');
        $catatan = $this->request->getPost('catatan');

        $data = [
            'catatan' => $catatan
        ];

        $this->transaksiModel->where('kode_transaksi', $kode_transaksi)->set($data)->update();

        // Provide feedback to the user
        return redirect()->back()->with('message', 'Voucher and Note updated successfully');
    }
}
