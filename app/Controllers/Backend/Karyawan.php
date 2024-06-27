<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $karyawanModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Karyawan | Recaka',
            'content_header' => 'Kelola Karyawan',
            'karyawan' => $this->karyawanModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('backend/karyawan/index', $data);
    }

    public function insert()
    {
        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'no_telp' => $this->request->getPost('no_telp')
        ];

        if ($this->karyawanModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Karyawan <b>' . $data['nama_karyawan'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Karyawan <b>' . $data['nama_karyawan'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'no_telp' => $this->request->getPost('no_telp')
        ];

        if ($this->karyawanModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Karyawan <b>' . $data['nama_karyawan'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Karyawan <b>' . $data['nama_karyawan'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $karyawan = $this->karyawanModel->find($id);

        if ($this->karyawanModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Karyawan <b>' . $karyawan['nama_karyawan'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Karyawan <b>' . $karyawan['nama_karyawan'] . '</b> tidak dapat dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
