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

        // Ambil nama produk berdasarkan produk_id
        $produk = $this->produkModel->find($produk_id);

        if (!$produk) {
            // Handle error jika produk tidak ditemukan
            return redirect()->route('frontend.produk.view')->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk dengan ID <b>' . $produk_id . '</b> tidak ditemukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        $data_input = [
            'member_id' => $member_id,
            'produk_id' => $produk_id,
            'jumlah' => $jumlah
        ];

        $cek_produk = $this->keranjangModel->where('member_id', $data_input['member_id'])
            ->where('produk_id', $data_input['produk_id'])
            ->first();

        if ($cek_produk) {
            // Produk sudah ada di keranjang, tampilkan pesan kesalahan
            return redirect()->route('frontend.produk.view')->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $produk['nama_produk'] . '</b> sudah ada di keranjang! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            // Produk belum ada di keranjang, tambahkan ke keranjang
            $this->keranjangModel->insert($data_input);
            return redirect()->route('frontend.produk.view')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $produk['nama_produk'] . '</b> berhasil ditambahkan ke keranjang! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function updateCart()
    {
        $quantities = $this->request->getPost('jumlah');
        $member_id = session()->get('id');

        // Fetch all products in the cart along with their current stock
        $cartItems = $this->keranjangModel->select('keranjang.id as keranjang_id, produk.id as produk_id, produk.nama_produk, produk.jumlah as stok')
            ->join('produk', 'keranjang.produk_id = produk.id')
            ->where('keranjang.member_id', $member_id)
            ->findAll();

        foreach ($cartItems as $cartItem) {
            $cart_id = $cartItem['keranjang_id'];
            // $produk_id = $cartItem['produk_id'];
            $stok = $cartItem['stok'];
            $nama_produk = $cartItem['nama_produk'];

            if (isset($quantities[$cart_id])) {
                $desired_quantity = $quantities[$cart_id];

                // Check if there is enough stock
                if ($stok < $desired_quantity) {
                    return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Stok produk <b>' . $nama_produk . '</b> tidak mencukupi! (Tersisa: <b>' . $cartItem['stok'] . '</b>)<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }

                // Update the cart with the new quantity
                $this->keranjangModel->update($cart_id, ['jumlah' => $desired_quantity]);
            }
        }
        return redirect()->back()->with('success', '<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Jumlah keranjang telah ter-update!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }


    // public function updateCart()
    // {
    //     $quantities = $this->request->getPost('jumlah');

    //     foreach ($quantities as $id => $quantity) {
    //         $this->keranjangModel->update($id, ['jumlah' => $quantity]);
    //     }

    //     return redirect()->back()->with('success', '<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Jumlah keranjang telah ter-update.</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    // }

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

        $storeKeranjang = $this->keranjangModel->select('produk.id as produk_id, nama_produk, keranjang.jumlah, harga_umum, produk.jumlah as stok')
            ->join('members', 'keranjang.member_id = members.id')
            ->join('produk', 'keranjang.produk_id = produk.id')
            ->get()->getResultArray();

        foreach ($storeKeranjang as $storeCartItem) {
            // Update the stock in the ProdukModel
            $new_stok = $storeCartItem['stok'] - $storeCartItem['jumlah'];
            $this->produkModel->update($storeCartItem['produk_id'], ['jumlah' => $new_stok]);
            $bonus = floor($storeCartItem['jumlah'] / 1000);
            $transaction_detail_data[] = [
                'transaksi_kode' => $transaksi_data['kode_transaksi'],
                'nama_produk' => $storeCartItem['nama_produk'],
                'jumlah' => $storeCartItem['jumlah'],
                'harga' => $storeCartItem['harga_umum'],
                'bonus' => $bonus
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

        return redirect()->to('http://localhost:8080/member/orders/order-details/' . $transaksi_data['kode_transaksi']);
    }
}
