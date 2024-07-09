<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('frontend/layouts/partials/head') ?>
</head>

<body>
    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <?= $this->include('frontend/layouts/partials/navbar') ?>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Contact Form -->
    <div class="untree_co-section">
        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 p-5 border">
                        <div class="row mb-5">
                            <h1>Form Reset Password</h1>
                        </div>
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label class="text-black">Username</label>
                                <input type="text" name="username" maxlength="25" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black">Password Lama</label>
                                        <input type="password" name="password_old" maxlength="25" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black">Password Baru</label>
                                        <input type="password" name="password_new" maxlength="25" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary-hover-outline form-control">Reset Password</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">Kembali ke Halaman <a href="<?= url_to('frontend.login.view'); ?>">Login</a> atau <a href="<?= url_to('frontend.register.view'); ?>">Buat akun baru</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <?= $this->include('frontend/layouts/partials/footer') ?>
        </div>
    </footer>
    <!-- End Footer Section -->

    <?= $this->include('frontend/layouts/partials/script') ?>
</body>

</html>