<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel, $karyawanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $role = session()->get('role');
        if ($role != 1) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Kelola User | Recaka',
            'content_header' => 'Kelola User',
            'users' => $this->userModel->select('users.id, nama_karyawan, no_telp, username, password, role, status')->join('karyawan', 'users.karyawan_id = karyawan.id')->findAll(),
            'karyawan_options' => $this->karyawanModel->findAll()
        ];

        return view('backend/users/index', $data);
    }

    public function insert()
    {
        $data = [
            'karyawan_id' => $this->request->getPost('karyawan_id'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('username'), PASSWORD_DEFAULT)
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">User <b>' . $data['karyawan_id'] . '</b> telah ditambahkan <i class="fas fa-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">User <b>' . $data['karyawan_id'] . '</b> sudah ada!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'karyawan_id' => $this->request->getPost('karyawan_id'),
            'username' => $this->request->getPost('username')
        ];


        $this->userModel->update($id, $data);
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">User <b>' . $data['karyawan_id'] . '</b> telah di-update</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        // } else {
        // return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->validation->listErrors() . '</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        // }
    }

    public function getEditById()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->select('users.id, name, username, password, role, status')->join('karyawan', 'users.karyawan_id = users.id')->find($id);

        return json_encode($user);
    }

    public function resetPassword()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);
        $default_password = password_hash($user['username'], PASSWORD_DEFAULT);

        $this->userModel->update($id, ['password' => $default_password]);
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password <b>' . $user['karyawan_id'] . '</b> telah di-reset</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function userStatus()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);

        if ($user['status'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->userModel->update($id, ['status' => $status]);

        if ($user['status'] == 1) {
            return redirect()->back()->with('message', '<div class="alert alert-dark alert-dismissible fade show" role="alert">User <b>' . $user['karyawan_id'] . '</b> telah dinonaktifkan</.b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">User <b>' . $user['karyawan_id'] . '</b> telah diaktifkan</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);

        $this->userModel->delete($id);
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">User <b>' . $user['username'] . '</b> telah dihapus</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
