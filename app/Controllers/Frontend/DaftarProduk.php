<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DaftarProduk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk | Recaka',
            'content_header' => 'Daftar Produk Recaka',
        ];

        return view('frontend/daftar_produk', $data);
    }
}
