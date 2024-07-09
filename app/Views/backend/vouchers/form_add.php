<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .hidediv {
        display: none;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Tambah Voucher</h4>
    </div>
    <form action="<?= url_to('backend.voucher.insert'); ?>" method="post">
        <div class="card-body">
            <?= session()->getFlashdata('message_add') ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kode Voucher</label>
                        <input type="text" name="kode_voucher" maxlength="25" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Diskon</label>
                        <div class="input-group">
                            <input type="number" name="diskon" min="0" maxlength="3" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" max="100" class="form-control" required autofocus>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control flatpickr-no-config" placeholder="Select date..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Berakhir</label>
                        <input type="date" name="tanggal_berakhir" class="form-control flatpickr-no-config" placeholder="Select date..">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            <div class="d-flex mt-4">
                <div class="me-auto"><a href="<?= url_to('backend.voucher.view'); ?>" class="btn btn-light-secondary"><i class="bi bi-reply"></i> Kembali</a></div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>