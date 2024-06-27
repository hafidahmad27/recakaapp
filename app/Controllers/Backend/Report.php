<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Report extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Report | Recaka',
            'content_header' => 'Report',
        ];

        return view('backend/reports/index', $data);
    }
}
