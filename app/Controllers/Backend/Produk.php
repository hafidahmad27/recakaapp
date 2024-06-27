<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Produk | Recaka',
            'content_header' => 'Kelola Produk',
            'produk' => $this->produkModel->findAll(),
        ];

        return view('backend/produk/index', $data);
    }

    public function form_add()
    {
        $data = [
            'title' => 'Form Tambah Produk | HFD APP',
            'produk' => $this->produkModel->findAll()
        ];

        return view('backend/produk/form_add', $data);
    }

    public function insert()
    {
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'foto_produk' => $this->request->getPost('foto_produk'),
        ];

        if ($this->produkModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'foto_produk' => $this->request->getPost('foto_produk'),
        ];

        if ($this->produkModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $produk = $this->produkModel->find($id);

        if ($this->produkModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $produk['kode_produk'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Level Member <b>' . $produk['kode_produk'] . '</b> tidak dapat dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
