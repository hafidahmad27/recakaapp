<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VoucherModel;

class CekVoucher extends BaseController
{
    protected $voucherModel;

    public function __construct()
    {
        $this->voucherModel = new VoucherModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Voucher Anda | Recaka',
            'content_header' => 'Voucher Anda',
            'vouchers' => $this->voucherModel->findAll()
        ];

        return view('frontend/cek_voucher', $data);
    }
}
