<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Files\File;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel, $validation;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Produk | Recaka',
            'content_header' => 'Kelola Produk',
            'produk' => $this->produkModel->orderBy('kode_produk', 'DESC')->findAll(),
        ];

        return view('backend/produk/index', $data);
    }

    public function form_add()
    {
        $data = [
            'title' => 'Form Tambah Produk | HFD APP',
            'produk' => $this->produkModel->findAll(),
            'display_kode_produk' => $this->produkModel->generateKodeProduk()
        ];

        return view('backend/produk/form_add', $data);
    }

    public function insert()
    {
        $img = $this->request->getFile('foto_produk');

        if ($img->getError() == 4) {
            $newName = 'default.png';
        } else {
            $newName = $img->getRandomName();
            $img->move('uploads', $newName);
        }

        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga_umum' => $this->request->getPost('harga_umum'),
            'jumlah' => $this->request->getPost('jumlah'),
            'foto_produk' => $newName
        ];

        if ($this->produkModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . ' - ' . $data['nama_produk'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . ' - ' . $data['nama_produk'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $img = $this->request->getFile('foto_produk');

        if ($img != null) {
            if ($img->getError() == 4) {
                $newName = 'default.png';
            } else {
                $newName = $img->getRandomName();
                $img->move('uploads', $newName);

                if ($this->request->getVar('oldName') != 'default.png') {
                    unlink('uploads/' . $this->request->getVar('oldName'));
                }
            }
        } else {
            $newName = 'default.png';
        }

        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga_umum' => $this->request->getPost('harga_umum'),
            'jumlah' => $this->request->getPost('jumlah'),
            'foto_produk' => $newName,
        ];

        if ($this->produkModel->update($kode_produk, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . ' - ' . $data['nama_produk'] . '</b>  telah di-update <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $data['kode_produk'] . ' - ' . $data['nama_produk'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function getEditById()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->produkModel->where('kode_produk', $kode_produk)->first();

        return json_encode($produk);
    }

    public function delete()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->produkModel->where('kode_produk', $kode_produk)->first();

        if ($produk['foto_produk'] != 'default.png') {
            unlink('uploads/' . $produk['foto_produk']);
        }

        if ($this->produkModel->delete($kode_produk)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $produk['kode_produk'] . ' - ' . $produk['nama_produk'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $produk['kode_produk'] . ' - ' . $produk['nama_produk'] . '</b> tidak dapat dihapus! karena <b>terhubung</b> dengan data lain <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
