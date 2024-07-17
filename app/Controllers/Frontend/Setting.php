<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;

class Setting extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
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
        // Ambil input dari form
        $username = $this->request->getPost('username');
        $password_old = $this->request->getVar('password_old');
        $password_new = $this->request->getVar('password_new');

        // Cari user berdasarkan username
        $user = $this->memberModel->where('username', $username)->first();

        // Validasi jika user tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Member dengan username <b>' . $username . '</b> tidak ditemukan.');
        }

        // Validasi jika password lama tidak sesuai dengan password yang tersimpan
        if (!password_verify($password_old, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Password lama salah.');
        }

        // Enkripsi password baru
        $hashed_password = password_hash($password_new, PASSWORD_DEFAULT);

        // Update password baru ke dalam database
        $this->memberModel->update($user['id'], ['password' => $hashed_password]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Password member <b>' . $user['nama_member'] . '</b> berhasil diubah.');
    }
}
