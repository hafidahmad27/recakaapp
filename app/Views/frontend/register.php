<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('frontend/layouts/partials/head') ?>
</head>

<body>
    <?= $this->include('frontend/layouts/partials/script') ?>
</body>

</html>