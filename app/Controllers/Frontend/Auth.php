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
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');
        $member = $this->memberModel->select('members.id, nama_member, username, password, no_telp, member_level_id, nama_level_member, status')->join('member_levels', 'members.member_level_id = member_levels.id')->where('username', $username)->first();
        if ($member) {
            if ($member['status'] == 1) {
                if (password_verify($password, $member['password'])) {
                    $data = [
                        'id' => $member['id'],
                        'nama_member' => $member['nama_member'],
                        'username' => $member['username'],
                        'password' => $member['password'],
                        'no_telp' => $member['no_telp'],
                        'member_level_id' => $member['member_level_id'],
                        'nama_level_member' => $member['nama_level_member'],
                    ];
                    session()->set($data);
                    return redirect()->route('frontend.produk.view');
                } else {
                    return redirect()->back()->withInput()->with('error', '<b>Password salah!</b>');
                }
            } else {
                return redirect()->back()->with('error', 'Member <b>' . $member['username'] . '</b> tidak aktif!');
            }
        } else {
            return redirect()->back()->with('error', '<b>Username tidak ditemukan!</b>')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function register()
    {
        $data = [
            'title' => 'Register Akun | Recaka',
        ];

        return view('frontend/register', $data);
    }

    public function register_process()
    {
        $data = [
            'title' => 'Register Akun | Recaka',
            'nama_member' => $this->request->getPost('nama_member'),
            'no_telp' => $this->request->getPost('no_telp'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        if ($this->memberModel->insert($data)) {
            return redirect()->route('frontend.login.view')->with('error', 'Member <b>' . $data['nama_member'] . '</b> berhasil dibuat! Silahkan Login');
        } else {
            return redirect()->back()->withInput()->with('error', 'Username <b>' . $data['username'] . '</b> sudah ada! Mohon input username lain.');
        }


        // return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        // } else {
        // return view('frontend/register', $data);
        // return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        // }
    }

    public function lupa_password()
    {
        $data = [
            'title' => 'Reset Password | Recaka',
        ];

        return view('frontend/lupa_password', $data);
    }
}
