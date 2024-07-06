<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Umum</th>
                        <th>Harga Khusus</th>
                        <th>Level Member</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($harga as $hrg) : ?>
                        <tr>
                            <td><?= $hrg['nama_produk'] ?></td>
                            <td><?= number_format($hrg['harga_umum'], 0, ',', '.'); ?></td>
                            <td><?= number_format($hrg['harga_khusus'], 0, ',', '.'); ?></td>
                            <td><?= $hrg['nama_level_member'] ?></td>
                            <td width="20%" align="center">
                                <button type="button" class="btn btn-primary btn-sm btnEditHarga" data-id="<?= $hrg['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                <form action="<?= url_to('backend.harga.delete'); ?>" method="post" class="d-inline"> |
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $hrg['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
            <h4 class="card-title">Form Input Harga Produk</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message_add'); ?>
            <form action="<?= url_to('backend.harga.insert'); ?>" method="post" class="form form-vertical">
                <div class="form-body">
                    <div class="form-group col-md-12">
                        <label>Produk</label>
                        <select name="produk_kode" class="form-select" autofocus required>
                            <option value="" selected disabled>Pilih Produk..</option>
                            <?php foreach ($produk_options as $role_option) : ?>
                                <option value="<?= $role_option['kode_produk']; ?>"><?= $role_option['nama_produk']; ?> - <?= number_format($role_option['harga_umum'], 0, ',', '.'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Level Member</label>
                            <select name="member_level_id" class="form-select" autofocus required>
                                <option value="" selected disabled>Pilih Level..</option>
                                <?php foreach ($memberLevel_options as $role_option) : ?>
                                    <option value="<?= $role_option['id']; ?>"><?= $role_option['nama_level_member']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga Khusus</label>
                            <input type="number" name="harga_khusus" min="0" maxlength="9" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL FORM Edit Harga -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Harga</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.harga.update'); ?>" method="post" id="formEditHarga">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>Produk</label>
                            <input type="text" id="produk_nama" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Lvl Member</label>
                            <select id="member_level_id" name="member_level_id" class="form-select" autofocus required>
                                <option value="" selected disabled>Pilih Level..</option>
                                <?php foreach ($memberLevel_options as $role_option) : ?>
                                    <option value="<?= $role_option['id']; ?>"><?= $role_option['nama_level_member']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Harga Khusus</label>
                            <input type="number" id="harga_khusus" name="harga_khusus" min="0" maxlength="9" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
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