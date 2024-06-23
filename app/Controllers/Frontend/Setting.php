<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Setting extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Settings | Recaka',
            'content_header' => 'Settings',
        ];

        return view('frontend/settings', $data);
    }

    public function changeProfil()
    {
        // 
    }

    public function changePassword()
    {
        // 
    }
}
