<a class="navbar-brand" href="index.html">RECAKA<span>.</span></a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarsFurni">
    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item active">
            <a class="nav-link" href="<?= url_to('frontend.page.home.view'); ?>">Home</a>
        </li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.shop.view'); ?>">Shop</a></li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.about.view'); ?>">About us</a></li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.services.view'); ?>">Services</a></li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.blog.view'); ?>">Blog</a></li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.contact.view'); ?>">Contact us</a></li>
    </ul>

    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li><a class="nav-link" href="#"><img src="<?= base_url(); ?>assets/furni-1.0.0/images/user.svg"></a></li>
        <li><a class="nav-link" href="<?= url_to('frontend.page.cart.view'); ?>"><img src="<?= base_url(); ?>assets/furni-1.0.0/images/cart.svg"></a></li>
    </ul>
</div>