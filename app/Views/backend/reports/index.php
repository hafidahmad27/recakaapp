<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <p>Filter Date Range</p>
        <form action="<?= url_to('backend.report.filter') ?>" method="post">
            <div class="input-group">
                <input type="date" name="start_date" value="<?= isset($start_date) ? $start_date : '' ?>" class="form-control flatpickr-no-configz" placeholder="Dari tanggal..">
                <input type="date" name="end_date" value="<?= isset($end_date) ? $end_date : '' ?>" class="form-control flatpickr-no-configz" placeholder="Sampai tanggal..">
                <button type="submit" class="btn btn-primary"><i class="bi bi-funnel"></i> Filter</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <?= session()->getFlashdata('message'); ?>
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Nama Member</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order['kode_transaksi']; ?></td>
                        <td><?= $order['nama_member']; ?></td>
                        <td><?= date('d-m-Y', strtotime($order['tanggal_transaksi'])) ?></td>
                        <td>
                            <?php if ($order['status'] == null) : ?>
                                Pending
                            <?php elseif ($order['status'] == 0) : ?>
                                Dibatalkan
                            <?php elseif ($order['status'] == 1) : ?>
                                Berhasil
                            <?php endif ?>
                        </td>
                        <td class="text-end"><?= number_format($order['total'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>