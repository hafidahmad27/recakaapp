<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Member</th>
                        <th>Total Bayar</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pembayaran as $pmbyrn) : ?>
                        <tr class="<?= $pmbyrn['status'] == '0' ? 'bg-danger bg-opacity-50' : ''; ?>">
                            <td><?= $no++ ?></td>
                            <td><a href="<?= url_to('backend.verifikasi_pembayaran.detail_transaksi.view', $pmbyrn['transaksi_kode']); ?>" class="text-bold" style="font-size: 13pt;"><u><?= $pmbyrn['transaksi_kode']; ?></u></a></td>
                            <td><?= $pmbyrn['nama_member'] ?></td>
                            <td class="text-end"><?= number_format($pmbyrn['total'] - ($pmbyrn['diskon'] / 100) * $pmbyrn['total'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <?php if ($pmbyrn['foto_bukti_pembayaran'] == null) : ?>
                                    Tidak ada
                                <?php else : ?>
                                    <a href="<?= base_url(); ?>uploads/<?= $pmbyrn['foto_bukti_pembayaran']; ?>" target="_blank" title="Tautan ke bukti pembayaran">[Foto]</a>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <?php if ($pmbyrn['status'] == null) : ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($pmbyrn['status'] == 0) : ?>
                                    <span class="badge bg-danger">Dibatalkan</span>
                                <?php elseif ($pmbyrn['status'] == 1) : ?>
                                    <span class="badge bg-success">Berhasil</span>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <form action="<?= url_to('backend.verifikasi_pembayaran.ubahStatus'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $pmbyrn['id'] ?>">
                                    <?php if ($pmbyrn['status'] == null) : ?>
                                        <button type="submit" name="status" value="1" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button> |
                                        <button type="submit" name="status" value="0" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                                    <?php elseif ($pmbyrn['status'] == 0) : ?>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button>
                                    <?php elseif ($pmbyrn['status'] == 1) : ?>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                                    <?php endif ?>
                                </form>
                            </td>
                            <td width="20%">
                                <form action="<?= url_to('backend.verifikasi_pembayaran.update'); ?>" method="post">
                                    <div class="input-group">
                                        <div class="d-none"><?= $pmbyrn['keterangan']; ?></div>
                                        <input type="text" name="keterangan" maxlength="100" class="form-control" value="<?= $pmbyrn['keterangan']; ?>" <?= $pmbyrn['status'] != '0' ? 'disabled' : ''; ?>>
                                        <input type="hidden" name="id" value="<?= $pmbyrn['id']; ?>">
                                        <button type="submit" class="btn icon btn-primary btn-sm" <?= $pmbyrn['status'] != '0' ? 'disabled' : ''; ?>><i class="bi bi-arrow-repeat"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>