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

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <?= $this->include('frontend/layouts/partials/hero') ?>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <?= $this->renderSection('content') ?>

    <!-- Start Footer Section -->
    <!-- <footer class="footer-section"> -->
    <div class="container mt-3">
        <?= $this->include('frontend/layouts/partials/footer') ?>
    </div>
    <!-- </footer> -->
    <!-- End Footer Section -->

    <?= $this->include('frontend/layouts/partials/script') ?>
</body>

</html>