<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="buttons">
                <a href="<?= url_to('backend.produk.form_add.view'); ?>" class="btn icon btn-primary"><i class="bi bi-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Kode Produk</th>
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
                            <td><?= $hrg['produk_kode'] ?></td>
                            <td><?= $hrg['harga_umum'] ?></td>
                            <td><?= $hrg['harga_khusus'] ?></td>
                            <td><?= $hrg['nama_level_member'] ?></td>
                            <td width="15%" align="center">
                                <button type="button" class="btn btn-primary btn-sm btnEditHarga" data-id="<?= $hrg['produk_kode'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                <form action="<?= url_to('backend.user.delete'); ?>" method="post" class="d-inline"> |
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $hrg['produk_kode'] ?>">
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

<?= $this->endSection() ?>