<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header ms-auto">
            <p class="card-text">
                Kode Transaksi : TRX00000000 <br>
                Tanggal Transaksi : 00-00-0000 <br>
                Status : Berhasil
            </p>
        </div>
        <div class="card-body">
            <!-- table striped -->
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>NAMA PRODUK</th>
                            <th class="text-end">QTY</th>
                            <th class="text-end">HARGA</th>
                            <th class="text-end">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ABC</td>
                            <td class="text-end">1.000</td>
                            <td class="text-end">100.000</td>
                            <td class="text-end">100.000.000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"></th>
                            <th>TOTAL</th>
                            <th class="text-end">100.000.000</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Voucher Diskon 50%</th>
                            <th class="text-end">-50.000.000</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>TOTAL SETELAH DISKON</th>
                            <th class="text-end">50.000.000</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>