<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
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
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');
        $user = $this->userModel->select('nama_karyawan, no_telp, username, password, role, status')->join('karyawan', 'users.karyawan_id = karyawan.id')->where('username', $username)->first();
        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nama_karyawan' => $user['nama_karyawan'],
                        'no_telp' => $user['no_telp'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'role' => $user['role'],
                    ];
                    session()->set($data);
                    return redirect()->route('backend.dashboard.view');
                } else {
                    return redirect()->back()->withInput()->with('error', '<b>Password salah!</b>');
                }
            } else {
                return redirect()->back()->with('error', 'User <b>' . $user['username'] . '</b> tidak aktif!');
            }
        } else {
            return redirect()->back()->with('error', '<b>Username tidak ditemukan!</b>');
        }
    }

    public function logout_backend()
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
