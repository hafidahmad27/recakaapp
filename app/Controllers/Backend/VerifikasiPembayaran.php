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
        $data = [
            'title' => 'Daftar Transaksi | Recaka',
            'content_header' => 'Daftar Transaksi',
        ];

        return view('backend/verifikasi_pembayaran/lists', $data);
    }

    public function detail_transaksi()
    {
        $data = [
            'title' => 'Detail Transaksi | Recaka',
            'content_header' => 'Detail Transaksi',
        ];

        return view('backend/verifikasi_pembayaran/list_details', $data);
    }
}
