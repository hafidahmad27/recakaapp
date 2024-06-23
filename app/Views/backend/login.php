<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('backend/layouts/partials/head') ?>
</head>

<body>
    <?= $this->include('backend/layouts/partials/script') ?>
</body>

</html>