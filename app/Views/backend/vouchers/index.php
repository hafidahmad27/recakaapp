<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="buttons">
            <a href="<?= url_to('backend.voucher.form_add.view'); ?>" class="btn icon btn-primary"><i class="bi bi-plus"></i> Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <?= session()->getFlashdata('message'); ?>
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Voucher</th>
                    <th>Diskon (%)</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($vouchers as $member) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $member['kode_voucher']; ?></td>
                        <td><?= $member['diskon']; ?>%</td>
                        <td><?= $member['tanggal_mulai']; ?></td>
                        <td><?= $member['tanggal_berakhir']; ?></td>
                        <td style="text-align: justify;"><?= $member['deskripsi']; ?></td>
                        <td width="25%" align="center">
                            <button type="button" class="btn btn-primary btn-sm btnEditVoucher" data-id="<?= $member['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                            <form action="<?= url_to('backend.voucher.delete'); ?>" method="post" class="d-inline"> |
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL FORM Edit Vouchers -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Voucher</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.voucher.update'); ?>" method="post" id="formEditVoucher">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Voucher</label>
                                <input type="text" id="kode_voucher" name="kode_voucher" maxlength="25" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Diskon</label>
                                <div class="input-group">
                                    <input type="number" id="diskon" name="diskon" min="0" maxlength="3" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" max="100" class="form-control" autofocus>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control flatpickr-no-config" placeholder="Select date..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" class="form-control flatpickr-no-config" placeholder="Select date..">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" maxlength="255" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>