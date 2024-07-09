<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Member</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($transaksi as $transaction) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><a href="<?= url_to('backend.verifikasi_pembayaran.detail_transaksi.view', $transaction['transaksi_kode']); ?>" class="text-bold" style="font-size: 13pt;"><u><?= $transaction['transaksi_kode']; ?></u></a></td>
                            <td><?= $transaction['nama_member']; ?></td>
                            <td><?= $transaction['tanggal_transaksi']; ?></td>
                            <td><?= number_format($transaction['total'] - ($transaction['diskon'] / 100) * $transaction['total'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <?php if ($transaction['status'] == null) : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($transaction['status'] == 0) : ?>
                                    <span class="badge bg-danger">Dibatalkan</span>
                                <?php elseif ($transaction['status'] == 1) : ?>
                                    <span class="badge bg-success">Berhasil</span>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>