<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use App\Models\PembayaranModel;

class Keranjang extends BaseController
{
    protected $produkModel, $keranjangModel, $transaksiModel, $transaksiDetailModel, $pembayaranModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->keranjangModel = new KeranjangModel();
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        $id = session()->get('id');
        $total_harga_keranjang = $this->keranjangModel->selectSum('(produk.harga_umum * keranjang.jumlah)', 'total')
            ->join('produk', 'keranjang.produk_id = produk.id')
            ->where('keranjang.member_id', $id)
            ->first();

        $data = [
            'title' => 'Keranjang Produk | Recaka',
            'content_header' => 'Keranjang Produk',
            'display_kode_transaksi' => $this->transaksiModel->generateKodeTransaksi(),
            'keranjang' => $this->keranjangModel->select('keranjang.id, keranjang.member_id, produk_id, nama_produk, harga_umum, keranjang.jumlah, members.member_level_id')
                ->join('members', 'keranjang.member_id = members.id')
                ->join('produk', 'keranjang.produk_id = produk.id')
                ->where('keranjang.member_id', $id)
                ->findAll(),
            'total_harga_keranjang' => $total_harga_keranjang['total'] ?? 0
        ];

        return view('frontend/keranjang', $data);
    }

    public function addToCart()
    {
        $member_id = session()->get('id');
        $produk_id = $this->request->getPost('produk_id');
        $jumlah = 1;

        $data_input = [
            'member_id' => $member_id,
            'produk_id' => $produk_id,
            'jumlah' => $jumlah
        ];

        $cek_produk = $this->keranjangModel->where('member_id', $data_input['member_id'])
            ->where('produk_id', $data_input['produk_id'])
            ->first();

        if ($cek_produk) {
            // Member Level ID sudah ada, tampilkan pesan kesalahan
            // dd('sudah ada');
            return redirect()->route('frontend.produk.view')->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data_input['produk_id'] . '</b> sudah ada di keranjang! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            // return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . implode($nama_produk) . ' - ' . implode($nama_level_member) . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $this->keranjangModel->insert($data_input);
            return redirect()->route('frontend.produk.view')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data_input['produk_id'] . '</b> berhasil ditambahkan ke keranjang <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    // public function updateCart()
    // {
    //     $id = $this->request->getPost('id');

    //     $data = [
    //         'jumlah' => dd($this->request->getPost('jumlah'))
    //     ];

    //     $this->keranjangModel->update($id, $data);
    //     return redirect()->back();
    // }

    public function updateCart()
    {
        // $cart_ids = $this->request->getPost('cart_ids');
        // $quantities = $this->request->getPost('quantities');
        // $voucher_code = $this->request->getPost('voucher_code');

        // foreach ($cart_ids as $index => $id) {
        //     $data = [
        //         'jumlah' => $quantities[$index]
        //     ];
        //     $this->keranjangModel->update($id, $data);
        // }

        // if (!empty($voucher_code)) {
        //     // Handle voucher code logic here
        //     // For example, check if the voucher is valid and apply the discount
        // }

        // return redirect()->back(); // Redirect to the cart page
    }

    public function deleteFromCart()
    {
        $id = $this->request->getPost('id');

        $this->keranjangModel->delete($id);
        return redirect()->back();
    }

    public function checkout()
    {
        $id = session()->get('id');
        $total_harga_keranjang = $this->keranjangModel->selectSum('(produk.harga_umum * keranjang.jumlah)', 'total')
            ->join('produk', 'keranjang.produk_id = produk.id')
            ->where('keranjang.member_id', $id)
            ->first();

        $transaksi_data = [
            'kode_transaksi' => $this->request->getPost('kode_transaksi'),
            'member_id' => session()->get('id'),
            'total' => $total_harga_keranjang['total'] ?? 0
        ];
        $this->transaksiModel->insert($transaksi_data);

        $storeKeranjang = $this->keranjangModel->select('nama_produk, keranjang.jumlah, harga_umum')
            ->join('members', 'keranjang.member_id = members.id')
            ->join('produk', 'keranjang.produk_id = produk.id')
            ->get()->getResultArray();
        foreach ($storeKeranjang as $storeCartItem) {
            $transaction_detail_data[] = [
                'transaksi_kode' => $transaksi_data['kode_transaksi'],
                'nama_produk' => $storeCartItem['nama_produk'],
                'jumlah' => $storeCartItem['jumlah'],
                'harga' => $storeCartItem['harga_umum']
            ];
        }
        $this->transaksiDetailModel->insertBatch($transaction_detail_data);

        $pembayaran_data = [
            'transaksi_kode' => $transaksi_data['kode_transaksi'],
            'foto_bukti_pembayaran' => null,
            'status' => null,
            'keterangan' => null,
        ];
        $this->pembayaranModel->insert($pembayaran_data);

        $this->keranjangModel->where('member_id', $id)->delete();

        return redirect()->back();
    }
}
