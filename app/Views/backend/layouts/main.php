<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('backend/layouts/partials/head') ?>
</head>

<body>
    <?= $this->include('backend/layouts/partials/navbar') ?>

    <?= $this->include('backend/layouts/partials/sidebar') ?>

    <h1><?= isset($content_header) ? $content_header : ''; ?></h1>

    <?= $this->renderSection('content') ?>

    <?= $this->include('backend/layouts/partials/footer') ?>

    <?= $this->include('backend/layouts/partials/script') ?>
</body>

</html>