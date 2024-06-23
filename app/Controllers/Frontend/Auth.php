<?php

namespace App\Controllers\Frontend;

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
            'title' => 'Login Member | Recaka',
        ];

        return view('frontend/login', $data);
    }

    public function login()
    {
        // 
    }

    public function logout()
    {
        // 
    }
}
