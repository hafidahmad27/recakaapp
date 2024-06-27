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
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input type="text" value="" class="form-control" disabled>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" maxlength="50" class="form-control" autofocus>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    <label>Foto Produk</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" min="0" maxlength="5" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="" class="form-control" maxlength="255" rows="3"></textarea>
        </div>
        <div class="d-flex">
            <div class="me-auto"><a href="<?= url_to('backend.produk.view'); ?>" class="btn btn-light-secondary"><i class="bi bi-reply"></i> Kembali</a></div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</button>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>