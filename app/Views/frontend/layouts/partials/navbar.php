<a class="navbar-brand" href="index.html">RECAKA<span>.</span></a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarsFurni">
    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item <?= url_is('member') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= url_to('frontend.produk.view'); ?>">Home</a>
        </li>
        <li class="nav-item <?= url_is('member/keranjang') ? 'active' : ''; ?>"> <a class=" nav-link" href="<?= url_to('frontend.keranjang.view'); ?>">Keranjang</a></li>
        <li class="nav-item <?= url_is('member/orders') ? 'active' : ''; ?>"> <a class=" nav-link" href="<?= url_to('frontend.orders.view'); ?>">Riwayat Order</a></li>
        <li class="nav-item <?= url_is('member/cek-voucher') ? 'active' : ''; ?>"> <a class=" nav-link" href="<?= url_to('frontend.cek_voucher.view'); ?>">Cek Voucher</a></li>
    </ul>

    <?php if (session()->get('nama_member')) : ?>
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 dropdown">
            <li class="nav-link">
                <?= session()->get('nama_member'); ?> (<?= strtoupper(session()->get('nama_level_member')) ?>)
                &nbsp;<img onclick="myFunction()" class="dropbtn" src="<?= base_url(); ?>assets/furni-1.0.0/images/user.svg">
            </li>
            <div id="myDropdown" class="dropdown-content">
                <a href="<?= url_to('frontend.logout'); ?>">Logout</a>
            </div>
        </ul>
    <?php endif ?>

    <style>
        /* Dropdown Button */
        .dropbtn {
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {
            display: block;
        }
    </style>

    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
</div>