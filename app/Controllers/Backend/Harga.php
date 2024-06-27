<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HargaModel;

class Harga extends BaseController
{
    protected $hargaModel;

    public function __construct()
    {
        $this->hargaModel = new HargaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Harga | Recaka',
            'content_header' => 'Kelola Harga',
            'harga' => $this->hargaModel->select('produk_kode, harga_umum, harga_khusus, nama_level_member')->join('produk', 'harga.produk_kode = produk.kode_produk')->join('member_levels', 'harga.member_level_id = member_levels.id')->findAll()
        ];

        return view('backend/harga/index', $data);
    }

    public function insert()
    {
        $data = [
            'produk_kode' => $this->request->getPost('produk_kode'),
            'harga_umum' => $this->request->getPost('harga_umum'),
            'harga_khusus' => $this->request->getPost('harga_khusus'),
            'member_level_id' => $this->request->getPost('member_level_id')
        ];

        if ($this->hargaModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['produk_kode'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['produk_kode'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'produk_kode' => $this->request->getPost('produk_kode'),
            'harga_umum' => $this->request->getPost('harga_umum'),
            'harga_khusus' => $this->request->getPost('harga_khusus'),
            'member_level_id' => $this->request->getPost('member_level_id')
        ];

        if ($this->hargaModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['produk_kode'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['produk_kode'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $harga = $this->hargaModel->find($id);

        if ($this->hargaModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $harga['produk_kode'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $harga['produk_kode'] . '</b> tidak dapat dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
