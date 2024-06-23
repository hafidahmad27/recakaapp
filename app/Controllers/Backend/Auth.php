<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Login Backend | Recaka',
        ];

        return view('backend/login', $data);
    }

    public function login_backend()
    {
        // 
    }

    public function logout_backend()
    {
        // 
    }
}
