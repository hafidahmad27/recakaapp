<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Transaksi extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi | Recaka',
            'content_header' => 'Transaksi',
        ];

        return view('frontend/transaksi', $data);
    }

    public function insert()
    {
        // 
    }

    public function riwayat_transaksi()
    {
        $data = [
            'title' => 'Riwayat Transaksi | Recaka',
            'content_header' => 'Riwayat Transaksi',
        ];

        return view('frontend/riwayat_transaksi', $data);
    }
}
