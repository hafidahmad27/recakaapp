<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .hidediv {
        display: none;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Tambah Produk</h4>
    </div>
    <form action="<?= url_to('backend.produk.insert'); ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?= session()->getFlashdata('message_add') ?>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" maxlength="6" class="form-control" required autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" maxlength="50" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Harga Umum</label>
                    <input type="number" name="harga_umum" min="1" maxlength="9" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" min="1" maxlength="5" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Foto Produk</label>
                    <input type="file" name="foto_produk" class="form-control">
                </div>
            </div>
            <div class="d-flex mt-3">
                <div class="me-auto"><a href="<?= url_to('backend.produk.view'); ?>" class="btn btn-light-secondary"><i class="bi bi-reply"></i> Kembali</a></div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>