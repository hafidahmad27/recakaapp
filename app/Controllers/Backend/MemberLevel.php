<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberLevelModel;

class MemberLevel extends BaseController
{
    protected $memberLevelModel;

    public function __construct()
    {
        $this->memberLevelModel = new MemberLevelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Level Member | Recaka',
            'content_header' => 'Kelola Level Member',
            'member_level' => $this->memberLevelModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('backend/member_levels/index', $data);
    }

    public function insert()
    {
        $data = [
            'nama_level_member' => $this->request->getPost('nama_level_member')
        ];

        if ($this->memberLevelModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'nama_level_member' => $this->request->getPost('nama_level_member')
        ];

        if ($this->memberLevelModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> telah di-update <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Level Member <b>' . $data['nama_level_member'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $member_level = $this->memberLevelModel->find($id);

        if ($this->memberLevelModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Level Member <b>' . $member_level['nama_level_member'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Level Member <b>' . $member_level['nama_level_member'] . '</b> tidak dapat dihapus! karena <b>terhubung</b> dengan data lain <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
