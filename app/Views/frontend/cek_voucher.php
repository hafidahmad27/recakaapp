<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">
        <div class="row">
            <?php foreach ($vouchers as $voucher) : ?>
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="post-entry">
                        <div class="post-content-entry">
                            <h3>Kode Voucher: <?= $voucher['kode_voucher']; ?></h3>
                            <h6>Diskon <?= $voucher['diskon']; ?>%</h6>
                            <div class="meta">
                                <span><?= date('d M Y H:m', strtotime($voucher['tanggal_mulai'])) . ' - ' . date('d M Y H:m', strtotime($voucher['tanggal_berakhir'])) ?></span>
                                <p style="text-align: justify;"><?= $voucher['deskripsi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- End Blog Section -->

<?= $this->endSection() ?>