<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="blog-section">
    <div class="container">
        <div class="card mb-3" style="min-height: 345px;">
            <div class="row g-0">
                <?php foreach ($produk as $product) : ?>
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>uploads/<?= $product['foto_produk'] ?>" class="img-fluid rounded-start" width="100%" alt="...">
                    </div>
                <?php endforeach ?>
                <div class="col-md-8">
                    <div class="card-body">
                        <?php foreach ($produk as $prod) : ?>
                            <form action="<?= url_to('frontend.keranjang.addToCart'); ?>" method="post">
                                <input type="hidden" name="produk_id" value="<?= $prod['id']; ?>"> <!-- Hidden input for produk_id -->
                                <h3 class="card-title"><?= $prod['nama_produk']; ?></h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item mt-4">
                                        <h5>Rp <?= number_format($prod['harga_umum'], 0, ',', '.'); ?> </h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 style="text-align: justify;">Deskripsi : <?= $prod['deskripsi']; ?></h6>
                                        <button type="submit" class="btn btn-black btn-sm mt-4">
                                            <span class="fa fa-plus"></span> Add to Cart
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>