<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="row mt-4">
    <div class="col-md-9">
        <div class="card" style="border-top: 3px solid;">
            <div class="ms-auto p-3">
                <?php foreach ($orders as $transaction) : ?>
                    Kode Transaksi : <?= $transaction['kode_transaksi'] ?> <br>
                    Nama Member : <?= $transaction['nama_member'] ?> <br>
                    Tanggal Transaksi : <?= date('d M Y', strtotime($transaction['tanggal_transaksi'])) ?> <br>
                    Status :
                    <?php if ($transaction['status'] == null) : ?>
                        <i class="fw-bold text-warning">Pending</i>
                    <?php elseif ($transaction['status'] == 0) : ?>
                        <i class="fw-bold text-danger">Dibatalkan Penjual</i>
                        <br>Alasan : <i class="fw-bold text-danger"><?= $transaction['keterangan'] ?></i>
                    <?php elseif ($transaction['status'] == 1) : ?>
                        <i class="fw-bold">Berhasil</i>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
            <div class="card-body">
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
                            <?php foreach ($order_details as $transaction_detail) : ?>
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
                                        <td class="text-end">[<?= $bonus; ?> bundle]</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <?php foreach ($orders as $transaction) : ?>
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

        <div class="card mt-4 p-4">
            <div class="row">
                <div class="col-md-7">
                    <form action="<?= url_to('frontend.order.applyVoucher'); ?>" method="POST" class="row g-3 align-items-center">
                        <input type="hidden" name="kode_transaksi" value="<?= $transaction['kode_transaksi']; ?>">
                        <div class="col-md-4">
                            <h5 class="text-dark">Pakai voucher?</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="kode_voucher" maxlength="25" value="<?= old('kode_voucher', $transaction['kode_voucher']) ?>" class="form-control py-3 <?= session('error') ? 'is-invalid' : 'is-valid'; ?>" placeholder="Masukkan kode voucher disini.." <?= $transaction['foto_bukti_pembayaran'] != null ? 'disabled' : ''; ?>>
                            <?php if (session('error')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-black" <?= $transaction['foto_bukti_pembayaran'] != null ? 'disabled' : ''; ?>>Gunakan</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-7">
                    <form action="<?= url_to('frontend.order.addNote'); ?>" method="POST" class="row g-3 align-items-center">
                        <input type="hidden" name="kode_transaksi" value="<?= $transaction['kode_transaksi']; ?>">
                        <div class="col-md-4">
                            <h5 class="text-dark">Ada catatan tambahan? (opsional)</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="catatan" maxlength="100" value="<?= $transaction['catatan'] ?? '' ?>" class="form-control py-3 <?= $transaction['catatan'] != null ? 'is-valid' : '' ?>" placeholder="Tulis disini.. (max: 100 karakter)" maxlength="100" <?= $transaction['foto_bukti_pembayaran'] != null ? 'disabled' : ''; ?>>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-black" <?= $transaction['foto_bukti_pembayaran'] != null ? 'disabled' : ''; ?>>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header text-white" style="background-color: #3b5d50;">Informasi Pembayaran</h5>
            <div class="card-body">
                <p class="fw-bold">Silahkan melakukan pembayaran melalui Nomor Rekening dibawah ini:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Bank BCA : 6712345678 </li>
                    <li class="list-group-item">Bank Mandiri : 10012345678</li>
                    <li class="list-group-item">Bank BNI : 5562424124</li>
                </ul>
                <div class="text-center">
                    <form action="<?= url_to('frontend.order.uploadBuktiBayar'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="transaksi_kode" value="<?= $transaction['kode_transaksi']; ?>">
                        <?php if ($transaction['foto_bukti_pembayaran'] == null && $transaction['status'] == null) : ?>
                            <input type="file" name="foto_bukti_pembayaran" class="form-control mt-4" required>
                            <button type="submit" class="btn btn-outline-secondary mt-3"><i class="fas fa-upload"></i> Upload bukti bayar</button>
                        <?php elseif ($transaction['foto_bukti_pembayaran'] != null && $transaction['status'] == null) : ?>
                            <input type="file" name="foto_bukti_pembayaran" class="form-control mt-4" disabled required>
                            <button type="submit" class="btn btn-outline-secondary mt-3" disabled><i class="fas fa-spinner"></i> Menunggu Konfirmasi</button>
                        <?php elseif ($transaction['foto_bukti_pembayaran'] != null && $transaction['status'] == 0) : ?>
                            <input type="file" name="foto_bukti_pembayaran" class="form-control mt-4" required>
                            <button type="submit" class="btn btn-outline-secondary mt-3"><i class="fas fa-upload"></i> Upload bukti bayar</button>
                        <?php elseif ($transaction['foto_bukti_pembayaran'] != null && $transaction['status'] == 1) : ?>
                            <input type="file" class="form-control mt-4" disabled required>
                            <button type="submit" class="btn btn-outline-secondary mt-3" disabled>Pembayaran terverifikasi ✓</button>
                        <?php endif ?>
                    </form>
                    <hr>
                    Informasi lebih lanjut hubungi: <br>
                    <?php foreach ($karyawan as $kry) :
                        $no_telp = $kry['no_telp'];
                        if (substr($no_telp, 0, 1) == '0') {
                            $no_telp = '62' . substr($no_telp, 1);
                        }
                    ?>
                        <?= $kry['nama_karyawan']; ?> (<a href="https://wa.me/<?= $no_telp; ?>" target="_blank"><?= $kry['no_telp']; ?></a>) <br>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>