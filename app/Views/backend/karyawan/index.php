<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Nama Karyawan</th>
                        <th width="23%">No Telp</th>
                        <th width="25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($karyawan as $karyawn) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $karyawn['nama_karyawan']; ?></td>
                            <td><?= $karyawn['no_telp']; ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-primary btn-sm btnEditKaryawan" data-id="<?= $karyawn['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                <form action="<?= url_to('backend.karyawan.delete'); ?>" method="post" class="d-inline"> |
                                    <input type="hidden" name="id" value="<?= $karyawn['id'] ?>">
                                    <button type="submit" class="btn icon btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Tambah Karyawan</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message_add'); ?>
            <form action="<?= url_to('backend.karyawan.insert'); ?>" method="post" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" name="nama_karyawan" maxlength="50" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>No Telp</label>
                                <input type="number" name="no_telp" min="0" maxlength="14" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" autofocus required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL FORM Edit Karyawan -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.karyawan.update'); ?>" method="post" id="formEditKaryawan">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label>Nama Karyawan</label>
                            <input type="text" id="nama_karyawan" name="nama_karyawan" maxlength="50" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label>No Telp</label>
                            <input type="text" id="no_telp" name="no_telp" maxlength="14" class="form-control">
                        </div>
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