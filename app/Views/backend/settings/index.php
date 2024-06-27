<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Profil</h4>
        </div>
        <div class="card-body">
            <form action="<?= url_to('backend.setting.changeProfil'); ?>" class="form form-vertical">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama User</label>
                            <?php if (session()->get('role') == 1) { ?>
                                <input type="text" name="username" value="<?= session()->get('role') ?>" class="form-control">
                            <?php } else { ?>
                                <p class="form-control-static"><?= session()->get('nama_karyawan'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <p class="form-control-static">
                                <?= session()->get('role') == 1 ? 'ADMIN' : 'KARYAWAN'; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= session()->get('username'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Telp.</label>
                            <input type="text" name="no_telp" value="<?= session()->get('no_telp'); ?>" class="form-control">
                        </div>
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
            <form class="form form-vertical">
                <div class="col-12">
                    <div class="form-group">
                        <label>Password lama (password sekarang)</label>
                        <input type="password" name="password_old" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password_new" class="form-control">
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