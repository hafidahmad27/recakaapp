<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Riwayat Order | Recaka',
            'content_header' => 'Riwayat Order',
        ];

        return view('frontend/orders', $data);
    }

    public function order_details()
    {
        $data = [
            'title' => 'Detail Order | Recaka',
            'content_header' => 'Detail Order',
        ];

        return view('frontend/order_details', $data);
    }
}
