<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">
            <!-- Start Column 2 -->
            <?php foreach ($produk as $product) : ?>
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="<?= url_to('frontend.produk.produk_details.view', $product['nama_produk']); ?>">
                        <img src="<?= base_url(); ?>uploads/<?= $product['foto_produk'] ?>" class="img-fluid product-thumbnail" alt="Product Image">
                        <h3 class="product-title"><?= $product['nama_produk']; ?></h3>
                        <strong class="product-price"><?= $product['harga_umum']; ?></strong>
                        <span class="icon-cross">
                            <img src="<?= base_url(); ?>assets/furni-1.0.0/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
            <?php endforeach ?>
            <!-- End Column 2 -->
        </div>
    </div>
</div>
<!-- End Product Section -->

<?= $this->endSection() ?>