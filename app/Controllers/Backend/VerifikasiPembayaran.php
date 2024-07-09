<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PembayaranModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;

class VerifikasiPembayaran extends BaseController
{
    protected $pembayaranModel, $transaksiModel, $transaksiDetailModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Verifikasi Pembayaran | Recaka',
            'content_header' => 'Verifikasi Pembayaran',
            'pembayaran' => $this->pembayaranModel->select('pembayaran.id, transaksi_kode, nama_member, tanggal_transaksi, pembayaran.status, total, foto_bukti_pembayaran, keterangan, kode_voucher, diskon')
                ->join('transaksi', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('vouchers', 'transaksi.voucher_id = vouchers.id')
                // ->orderBy('(pembayaran.status * -1)', 'ASC')
                ->findAll()
        ];

        return view('backend/verifikasi_pembayaran/index', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $this->pembayaranModel->update($id, $data);
        return redirect()->back();
    }

    public function ubahStatus()
    {
        $id = $this->request->getPost('id');
        $verifikasi_pembayaran = $this->pembayaranModel->find($id);
        $status_input = $this->request->getPost('status');

        if ($verifikasi_pembayaran['status'] == null && ($status_input == 1 || $status_input == 0)) {
            $status = $status_input;
            $keterangan = '';
        } else if ($verifikasi_pembayaran['status'] == 1) {
            $status = 0;
            $keterangan = $verifikasi_pembayaran['keterangan'];
        } else if ($verifikasi_pembayaran['status'] == 0) {
            $status = 1;
            $keterangan = '';
        } else {
            $status = $verifikasi_pembayaran['status'];
            $keterangan = $verifikasi_pembayaran['keterangan'];
        }

        $data = [
            'status' => $status,
            'keterangan' => $keterangan
        ];

        $this->pembayaranModel->update($id, $data);
        return redirect()->back();
    }

    public function daftar_transaksi()
    {
        $data = [
            'title' => 'Daftar Transaksi | Recaka',
            'content_header' => 'Daftar Transaksi',
            'transaksi' => $this->transaksiModel
                ->join('members', 'transaksi.member_id = members.id')
                ->join('vouchers', 'transaksi.voucher_id = vouchers.id')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->orderBy('tanggal_transaksi', 'DESC')->findAll()
        ];

        return view('backend/verifikasi_pembayaran/lists', $data);
    }

    public function detail_transaksi($kode_transaksi)
    {
        $data = [
            'title' => 'Detail Transaksi | Recaka',
            'content_header' => 'Detail Transaksi',
            'transaksi' => $this->transaksiModel->select('kode_transaksi, nama_member, tanggal_transaksi, pembayaran.status, total, kode_voucher, diskon')
                ->join('members', 'transaksi.member_id = members.id')
                ->join('vouchers', 'transaksi.voucher_id = vouchers.id')
                ->join('pembayaran', 'pembayaran.transaksi_kode = transaksi.kode_transaksi')
                ->where('kode_transaksi', $kode_transaksi)->findAll(),
            'transaksi_detail' => $this->transaksiDetailModel->where('transaksi_kode', $kode_transaksi)->findAll()
        ];

        return view('backend/verifikasi_pembayaran/list_details', $data);
    }
}
