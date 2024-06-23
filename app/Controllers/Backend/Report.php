<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Report extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan | Recaka',
            'content_header' => 'Laporan',
        ];

        return view('backend/reports/index', $data);
    }

    public function a_reports()
    {
        // 
    }

    public function b_reports()
    {
        // 
    }
}
