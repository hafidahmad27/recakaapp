<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    You're <?= session()->get('role') == 1 ? 'Admin' : 'Karyawan'; ?>
</div>
<?= $this->endSection() ?>