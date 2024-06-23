<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class VerifikasiPembayaran extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Verifikasi Pembayaran | Recaka',
            'content_header' => 'Verifikasi Pembayaran',
        ];

        return view('backend/verifikasi_pembayaran/index', $data);
    }

    public function daftar_transaksi()
    {
        // 
    }

    public function daftar_transaksi_detail()
    {
        // 
    }
}
