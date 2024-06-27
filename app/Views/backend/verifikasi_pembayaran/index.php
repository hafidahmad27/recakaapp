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
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Member</th>
                        <th>Total</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-06-18</td>
                        <td><a href="<?= url_to('backend.verifikasi_pembayaran.detail_transaksi.view', 'TRX24060001'); ?>" class="text-bold" style="font-size: 13pt;"><u>TRX24060001</u></a></td>
                        <td>Mr. Bean</td>
                        <td>100.000</td>
                        <td width="10%"><a href="" target="_blank"> [Foto]</a></td>
                        <td>
                            <span class="badge bg-warning">Pending</span>
                        </td>
                        <td class="text-center">
                            <form action="">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2024-06-19</td>
                        <td><a href="<?= url_to('backend.verifikasi_pembayaran.detail_transaksi.view', 'TRX24060002'); ?>" class="text-bold" style="font-size: 13pt;"><u>TRX24060002</u></a></td>
                        <td>Budi</td>
                        <td>200.000</td>
                        <td width="10%"><a href="" target="_blank"> [Foto]</a></td>
                        <td>
                            <span class="badge bg-success">Berhasil</span>
                        </td>
                        <td class="text-center">
                            <form action="">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                                <!-- <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button> -->
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024-06-20</td>
                        <td><a href="<?= url_to('backend.verifikasi_pembayaran.detail_transaksi.view', 'TRX24060003'); ?>" class="text-bold" style="font-size: 13pt;"><u>TRX24060003</u></a></td>
                        <td>Hendry</td>
                        <td>300.000</td>
                        <td width="10%"><a href="" target="_blank"> [Foto]</a></td>
                        <td>
                            <span class="badge bg-danger">Ditolak</span>
                        </td>
                        <td class="text-center">
                            <form action="">
                                <input type="hidden" name="id" value="">
                                <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button> -->
                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>