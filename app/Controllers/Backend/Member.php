<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Member | Recaka',
            'content_header' => 'Kelola Member',
            'members' => $this->memberModel->select('members.id, nama_level_member, nama_member, username, password, no_telp, status')->join('member_levels', 'members.member_level_id = member_levels.id')->findAll(),
        ];

        return view('backend/members/index', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'member_level_id' => $this->request->getPost('member_level_id'),
            'nama_member' => $this->request->getPost('nama_member'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'no_telp' => $this->request->getPost('no_telp'),
            'status' => $this->request->getPost('status')
        ];

        if ($this->memberModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Member <b>' . $data['nama_member'] . '</b> telah di-update</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Member <b>' . $data['nama_member'] . '</b> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function getEditById()
    {
        $id = $this->request->getPost('id');
        $member = $this->memberModel->find($id);

        return json_encode($member);
    }

    public function resetPassword()
    {
        $id = $this->request->getPost('id');
        $member = $this->memberModel->find($id);
        $default_password = password_hash($member['username'], PASSWORD_DEFAULT);

        $this->memberModel->update($id, ['password' => $default_password]);
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password <b>' . $member['username'] . '</b> telah di-reset</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function userStatus()
    {
        $id = $this->request->getPost('id');
        $member = $this->memberModel->find($id);

        if ($member['status'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->memberModel->update($id, ['status' => $status]);

        if ($member['status'] == 1) {
            return redirect()->back()->with('message', '<div class="alert alert-dark alert-dismissible fade show" role="alert">Member <b>' . $member['nama_member'] . '</b> telah dinonaktifkan</.b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">Member <b>' . $member['nama_member'] . '</b> telah diaktifkan</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $member = $this->memberModel->find($id);

        if ($this->memberModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">Member <b>' . $member['nama_member'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">Member <b>' . $member['nama_member'] . '</b> tidak dapat dihapus! karena <b>ada</b> dalam <b>Keranjang Item</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
