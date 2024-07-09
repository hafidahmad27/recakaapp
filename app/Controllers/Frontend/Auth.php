<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;

class Auth extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
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

    public function register()
    {
        $data = [
            'title' => 'Register Akun | Recaka',
        ];

        return view('frontend/register', $data);
    }

    public function lupa_password()
    {
        $data = [
            'title' => 'Reset Password | Recaka',
        ];

        return view('frontend/lupa_password', $data);
    }
}
