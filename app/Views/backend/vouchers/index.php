<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="buttons">
            <a href="<?= url_to('backend.voucher.form_add.view'); ?>" class="btn icon btn-primary"><i class="bi bi-plus"></i> Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Voucher</th>
                    <th>Nama Voucher</th>
                    <th>Diskon</th>
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
                        <td><?= $member['nama_voucher']; ?></td>
                        <td><?= $member['diskon']; ?></td>
                        <td><?= $member['tanggal_mulai']; ?></td>
                        <td><?= $member['tanggal_berakhir']; ?></td>
                        <td><?= $member['deskripsi']; ?></td>
                        <td width="25%" align="center">
                            <button type="button" class="btn btn-primary btn-sm btnEditVoucher" data-id="<?= $member['kode_voucher'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                            <form action="<?= url_to('backend.user.delete'); ?>" method="post" class="d-inline"> |
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $member['kode_voucher'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>