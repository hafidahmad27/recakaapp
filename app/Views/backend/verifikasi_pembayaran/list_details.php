<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header ms-auto">
            <?php foreach ($transaksi as $transaction) : ?>
                <p class="card-text">
                    Kode Transaksi : <?= $transaction['kode_transaksi'] ?> <br>
                    Nama Member : <?= $transaction['nama_member'] ?> <br>
                    Tanggal Transaksi : <?= date('d M Y', strtotime($transaction['tanggal_transaksi'])) ?> <br>
                    Status :
                    <?php if ($transaction['status'] == null) : ?>
                        <i class="fw-bold text-warning">Pending</i>
                    <?php elseif ($transaction['status'] == 0) : ?>
                        <i class="fw-bold text-danger">Dibatalkan Penjual</i>
                    <?php elseif ($transaction['status'] == 1) : ?>
                        <i class="fw-bold">Berhasil</i>
                    <?php endif ?>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="card-body">
            <!-- table striped -->
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>NAMA PRODUK</th>
                            <th class="text-end">QTY</th>
                            <th class="text-end" width="30%">HARGA</th>
                            <th class="text-end">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi_detail as $transaction_detail) : ?>
                            <tr>
                                <td><?= $transaction_detail['nama_produk']; ?></td>
                                <td class="text-end"><?= number_format($transaction_detail['jumlah'], 0, ',', '.'); ?></td>
                                <td class="text-end"><?= number_format($transaction_detail['harga'], 0, ',', '.'); ?></td>
                                <td class="text-end"><?= number_format($transaction_detail['jumlah'] * $transaction_detail['harga'], 0, ',', '.'); ?></td>
                            </tr>

                            <!-- Hitung bonus -->
                            <?php
                            $bonus = floor($transaction_detail['jumlah'] / 1000);
                            if ($bonus > 0) : ?>
                                <tr>
                                    <td>[Bonus <?= $transaction_detail['nama_produk']; ?>]</td>
                                    <td class="text-end"><?= $bonus; ?> bundle</td>
                                    <td class="text-end">0</td>
                                    <td class="text-end">0</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <?php foreach ($transaksi as $transaction) : ?>
                            <tr>
                                <th colspan="2"></th>
                                <th>TOTAL</th>
                                <th class="text-end fw-normal"><?= number_format($transaction['total'], 0, ',', '.'); ?></th>
                            </tr>
                            <tr>
                                <th colspan="2"></th>
                                <th><?= $transaction['kode_voucher'] . ' (Diskon ' . $transaction['diskon'] . '%)' ?></th>
                                <th class="text-end fw-normal">-<?= number_format(($transaction['diskon'] / 100) * $transaction['total'], 0, ',', '.') ?></th>
                            </tr>
                            <tr>
                                <th colspan="2"></th>
                                <th>TOTAL BAYAR</th>
                                <th class="text-end"><?= number_format($transaction['total'] - ($transaction['diskon'] / 100) * $transaction['total'], 0, ',', '.') ?></th>
                            </tr>
                        <?php endforeach ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>