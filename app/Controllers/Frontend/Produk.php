<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk | Recaka',
            'content_header' => 'Daftar Produk',
            'produk' => $this->produkModel->findAll()
        ];

        return view('frontend/produk', $data);
    }

    public function produk_details($nama_produk)
    {
        $data = [
            'title' => 'Detail Produk | Recaka',
            'content_header' => 'Detail Produk',
            'produk' => $this->produkModel->where('nama_produk', $nama_produk)->findAll()
        ];

        return view('frontend/produk_details', $data);
    }
}
