<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CekVoucher extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Voucher Anda | Recaka',
            'content_header' => 'Voucher Anda',
        ];

        return view('frontend/cek_voucher', $data);
    }
}
