<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('backend/layouts/partials/head') ?>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-md-4 mx-auto my-auto">
                <div id="auth-left">
                    <img src="<?= base_url('assets/assetswebprofil/img/LOGO2.png'); ?>" class="d-block mx-auto" width="75%" alt="Logo">
                    <div class="p-4 mt-4 border rounded">
                        <h6 class="mb-4 text-center">Login Backend</h6>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form action="<?= url_to('backend.login'); ?>" method="post">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" id="username" name="username" maxlength="25" class="form-control" value="<?= old('username'); ?>" placeholder="Username" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" id="password" name="password" maxlength="60" class="form-control" placeholder="Password" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block shadow-lg">Log in</button>
                        </form>
                    </div>
                    <!-- <div class="text-center mt-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('backend/layouts/partials/script') ?>
</body>

</html>