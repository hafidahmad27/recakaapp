<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Keranjang extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Keranjang Produk | Recaka',
            'content_header' => 'Keranjang Produk',
        ];

        return view('frontend/keranjang', $data);
    }

    public function addToCart()
    {
        // 
    }

    public function updateCart()
    {
        // 
    }

    public function deleteFromCart()
    {
        // 
    }
}
