<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('frontend/layouts/partials/head') ?>
</head>

<body>
    <?= $this->include('frontend/layouts/partials/navbar') ?>

    <?= $this->include('frontend/layouts/partials/sidebar') ?>

    <h1><?= isset($content_header) ? $content_header : ''; ?></h1>

    <?= $this->renderSection('content') ?>

    <?= $this->include('frontend/layouts/partials/footer') ?>

    <?= $this->include('frontend/layouts/partials/script') ?>
</body>

</html>