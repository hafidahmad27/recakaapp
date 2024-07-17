<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberLevelModel;
use App\Models\ProdukModel;
use App\Models\HargaModel;

class Harga extends BaseController
{
    protected $hargaModel, $produkModel, $memberLevelModel;

    public function __construct()
    {
        $this->memberLevelModel = new MemberLevelModel();
        $this->produkModel = new ProdukModel();
        $this->hargaModel = new HargaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Harga | Recaka',
            'content_header' => 'Kelola Harga',
            'memberLevel_options' => $this->memberLevelModel->orderBy('id', 'ASC')->findAll(),
            'produk_options' => $this->produkModel->findAll(),
            'harga' => $this->hargaModel->select('harga.id, kode_produk, nama_produk, harga_umum, harga_khusus, member_level_id, nama_level_member')->join('produk', 'harga.produk_id = produk.id')->join('member_levels', 'harga.member_level_id = member_levels.id')->orderBy('id', 'DESC')->findAll()
        ];

        return view('backend/harga/index', $data);
    }

    public function insert()
    {
        $data = [
            'produk_id' => $this->request->getPost('produk_id'),
            'harga_umum' => $this->request->getPost('harga_umum'),
            'harga_khusus' => $this->request->getPost('harga_khusus'),
            'member_level_id' => $this->request->getPost('member_level_id')
        ];

        $nama_produk = $this->hargaModel->select('nama_produk')->join('produk', 'harga.produk_id = produk.id')->where('produk_id', $data['produk_id'])->first();
        $nama_level_member = $this->hargaModel->select('nama_level_member')->join('member_levels', 'harga.member_level_id = member_levels.id')->where('member_level_id', $data['member_level_id'])->first();

        $cek_produk = $this->hargaModel->where('produk_id', $data['produk_id'])
            ->where('member_level_id', $data['member_level_id'])
            ->first();

        $nama_produk_str = is_array($nama_produk) ? implode('', $nama_produk) : $nama_produk;
        $nama_level_member_str = is_array($nama_level_member) ? implode('', $nama_level_member) : $nama_level_member;

        if ($cek_produk) {
            // Member Level ID sudah ada, tampilkan pesan kesalahan
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $nama_produk_str . ' - ' . $nama_level_member_str . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            // Simpan data ke basis data
            $this->hargaModel->insert($data);
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $nama_produk_str . ' - ' . $nama_level_member_str . '</b> telah ditambahkan <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }


    public function update()
    {
        $id = $this->request->getPost('id');
        $harga = $this->hargaModel->select('nama_produk, nama_level_member')->join('produk', 'harga.produk_id = produk.id')->join('member_levels', 'harga.member_level_id = member_levels.id')->find($id);

        $data = [
            'harga_umum' => $this->request->getPost('harga_umum'),
            'harga_khusus' => $this->request->getPost('harga_khusus'),
            'member_level_id' => $this->request->getPost('member_level_id')
        ];

        if ($this->hargaModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $harga['nama_produk'] . ' - ' . $harga['nama_level_member'] . '</b> telah di-update <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $harga['nama_produk'] . ' - ' . $harga['nama_level_member'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function getEditById()
    {
        $id = $this->request->getPost('id');
        $harga = $this->hargaModel->select('harga.id, nama_produk, harga_umum, harga_khusus, member_level_id, nama_level_member')->join('produk', 'harga.produk_id = produk.id')->join('member_levels', 'harga.member_level_id = member_levels.id')->find($id);

        return json_encode($harga);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $harga = $this->hargaModel->select('nama_produk, nama_level_member')->join('produk', 'harga.produk_id = produk.id')->join('member_levels', 'harga.member_level_id = member_levels.id')->find($id);

        if ($this->hargaModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk <b>' . $harga['nama_produk'] . ' - ' . $harga['nama_level_member'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Produk <b>' . $harga['nama_produk'] . ' - ' . $harga['nama_level_member'] . '</b> tidak dapat dihapus! karena <b>terhubung</b> dengan data lain <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
