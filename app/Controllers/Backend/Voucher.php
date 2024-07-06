<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VoucherModel;

class Voucher extends BaseController
{
    protected $voucherModel;

    public function __construct()
    {
        $this->voucherModel = new VoucherModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Voucher | Recaka',
            'content_header' => 'Kelola Voucher',
            'vouchers' => $this->voucherModel->findAll()
        ];

        return view('backend/vouchers/index', $data);
    }

    public function form_add()
    {
        $data = [
            'title' => 'Form Tambah Voucher | HFD APP',
            'voucher' => $this->voucherModel->findAll()
        ];

        return view('backend/vouchers/form_add', $data);
    }

    public function insert()
    {
        $data = [
            'kode_voucher' => $this->request->getPost('kode_voucher'),
            'diskon' => $this->request->getPost('diskon'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        if ($this->voucherModel->insert($data)) {
            return redirect()->back()->with('message_add', '<div class="alert alert-success alert-dismissible fade show" role="alert">Voucher <b>' . $data['kode_voucher'] . '</b> telah ditambahkan <i class="bi bi-check-circle"></i></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message_add', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Voucher <b>' . $data['kode_voucher'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'kode_voucher' => $this->request->getPost('kode_voucher'),
            'diskon' => $this->request->getPost('diskon'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        if ($this->voucherModel->update($id, $data)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Voucher <b>' . $data['kode_voucher'] . '</b>  telah di-update</b> <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Voucher <b>' . $data['kode_voucher'] . '</b> sudah ada! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function getEditById()
    {
        $id = $this->request->getPost('id');
        $voucher = $this->voucherModel->find($id);

        return json_encode($voucher);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $voucher = $this->voucherModel->find($id);

        if ($this->voucherModel->delete($id)) {
            return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Voucher <b>' . $voucher['kode_voucher'] . '</b> telah dihapus <i class="bi bi-check-circle"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            return redirect()->back()->with('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Voucher <b>' . $voucher['kode_voucher'] . '</b> tidak dapat dihapus! karena <b>terhubung</b> dengan data lain <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }
}
