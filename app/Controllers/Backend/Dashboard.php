<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Recaka',
            'content_header' => 'Dashboard',
        ];

        return view('backend/dashboard/index', $data);
    }
}
