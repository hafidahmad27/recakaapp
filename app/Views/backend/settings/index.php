<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Profil</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message') ?>
            <form action="<?= url_to('backend.setting.changeProfil'); ?>" method="post" class="form form-vertical">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="row">
                    <div class="form-group col-md-7">
                        <label>Nama User</label>
                        <?php if (session()->get('role') == 1) { ?>
                            <input type="text" name="nama_karyawan" value="<?= session()->get('nama_karyawan') ?>" class="form-control">
                        <?php } else { ?>
                            <p class="form-control-static"><?= session()->get('nama_karyawan'); ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Role</label>
                        <p class="form-control-static">
                            <?= session()->get('role') == 1 ? 'ADMIN' : 'KARYAWAN'; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7">
                        <label>Username</label>
                        <input type="text" name="username" maxlength="25" value="<?= session()->get('username'); ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label>No Telp.</label>
                        <input type="text" name="no_telp" value="<?= session()->get('no_telp'); ?>" maxlength="14" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-5 d-flex justify-content-end">
                    <button type="submit" class="btn icon btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Password</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message-password'); ?>
            <form action="<?= url_to('backend.setting.changePassword'); ?>" method="post" class="form form-vertical">
                <div class="col-12">
                    <div class="form-group">
                        <label>Password lama (password sekarang)</label>
                        <input type="password" name="password_old" maxlength="60" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password_new" maxlength="60" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-5 d-flex justify-content-end">
                    <button type="submit" class="btn icon btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>