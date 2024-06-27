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

                            <!-- FORM UPDATE START -->
                            <form action="<?= url_to('backend.karyawan.update'); ?>" method="post" class="d-inline">
                                <td>
                                    <div style="display: none;"><?= $karyawn['nama_karyawan']; ?></div>
                                    <input type="text" name="nama_karyawan" maxlength="50" class="form-control" value="<?= $karyawn['nama_karyawan']; ?>">
                                </td>
                                <td>
                                    <div style="display: none;"><?= $karyawn['no_telp']; ?></div>
                                    <input type="text" name="nama_karyawan" maxlength="14" class="form-control" value="<?= $karyawn['no_telp']; ?>">
                                </td>

                                <!-- TD ACTION (UPDATE & DELETE) START -->
                                <td align="center">
                                    <input type="hidden" name="id" value="<?= $karyawn['id'] ?>">
                                    <button type="submit" class="btn icon btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i> Update</button>
                            </form>
                            <!-- /.FORM UPDATE END -->

                            <form action="<?= url_to('backend.karyawan.delete'); ?>" method="post" class="d-inline"> |
                                <input type="hidden" name="id" value="<?= $karyawn['id'] ?>">
                                <button type="submit" class="btn icon btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            </td><!-- /.TD ACTION (UPDATE & DELETE) END -->
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
                                <input type="number" min="0" name="no_telp" maxlength="14" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" autofocus required>
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

<?= $this->endSection() ?>