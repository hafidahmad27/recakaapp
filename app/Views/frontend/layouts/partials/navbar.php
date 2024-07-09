<a class="navbar-brand" href="index.html">RECAKA<span>.</span></a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarsFurni">
    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item <?= url_is('member') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= url_to('frontend.produk.view'); ?>">Home</a>
        </li>
        <li class="nav-item <?= url_is('member/cek-voucher') ? 'active' : ''; ?>"> <a class=" nav-link" href="<?= url_to('frontend.cek_voucher.view'); ?>">Cek Voucher</a></li>
        <li class="nav-item <?= url_is('member/orders') ? 'active' : ''; ?>"> <a class=" nav-link" href="<?= url_to('frontend.orders.view'); ?>">Riwayat Order</a></li>
    </ul>

    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li class="nav-link">User &nbsp;<img src="<?= base_url(); ?>assets/furni-1.0.0/images/user.svg"></li>
        <li><a class="nav-link" href="<?= url_to('frontend.keranjang.view'); ?>"><img src="<?= base_url(); ?>assets/furni-1.0.0/images/cart.svg"></a></li>
    </ul>
</div>