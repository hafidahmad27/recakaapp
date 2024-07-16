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
                            <h1>Register Member</h1>
                        </div>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form action="<?= url_to('frontend.register.process'); ?>" method="post">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="text-black">Nama Member</label>
                                        <input type="text" name="nama_member" value="<?= old('nama_member'); ?>" maxlength=" 50" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-black">No. Telp</label>
                                        <input type="number" name="no_telp" value="<?= old('no_telp'); ?>" min=" 0" maxlength="14" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black">Username</label>
                                        <input type="text" name="username" maxlength="25" value="<?= old('username'); ?>" class=" form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black">Password</label>
                                        <input type="password" name="password" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary-hover-outline form-control">Register</button>
                            </div>
                        </form>
                        <p class="text-center mt-4">Sudah register? <a href="<?= url_to('frontend.login.view'); ?>">Login</a></p>
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