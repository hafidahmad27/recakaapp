<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;
use App\Models\UserModel;

class Setting extends BaseController
{
    protected $userModel, $karyawanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Settings | Recaka',
            'content_header' => 'Settings',
            'user' => $this->userModel->select('users.id, nama_karyawan, no_telp, username, password, role, status')->join('karyawan', 'users.karyawan_id = karyawan.id')->find($id)
        ];

        return view('backend/settings/index', $data);
    }

    public function changeProfil()
    {
        $id = session()->get('id');

        $dataKaryawan = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan') ?: session()->get('nama_karyawan'),
            'no_telp' => $this->request->getPost('no_telp')
        ];

        $dataUser = [
            'username' => $this->request->getPost('username')
        ];

        if (true) {
            session()->set($dataKaryawan);
            session()->set($dataUser);
            $this->karyawanModel->updateKaryawanWithUser($id, $dataKaryawan, $dataUser);
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profil berhasil diubah <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Gagal mengubah profil </b> <i class="bi bi-exclamation-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function changePassword()
    {
        $id = session()->get('id');
        $input_password_old = $this->request->getVar('password_old');
        $old_password = $this->userModel->find($id);
        $new_password = $this->request->getVar('password_new');

        $data = [
            'password' => password_hash($new_password, PASSWORD_DEFAULT)
        ];

        if (password_verify($input_password_old, $old_password['password'])) {
            session()->set($data);
            $this->userModel->update($id, $data);
            return redirect()->back()->with('message-password', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil diubah <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message-password', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Password lama tidak benar</b> <i class="bi bi-exclamation-circle"></i> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
