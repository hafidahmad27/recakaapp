<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Karyawan</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($users as $user) : ?>
                        <?php if ($user['role'] != 1) : ?>
                            <tr class="<?= $user['status'] != 0 ? '' : 'bg-dark'; ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $user['nama_karyawan']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td>
                                    <?php if (password_verify($user['username'], $user['password'])) { ?>
                                        DEFAULT
                                    <?php } else { ?>
                                        ********
                                        <form action="<?= url_to('backend.user.resetPassword'); ?>" method="post" class="d-inline float-right">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <button type="submit" class="btn btn-light btn-sm"><i class="bi bi-arrow-repeat"></i></button>
                                        </form>
                                    <?php } ?>
                                </td>
                                <td width="25%" align="center">
                                    <button type="button" class="btn btn-primary btn-sm btnEditUser" data-id="<?= $user['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                    <form action="<?= url_to('backend.user.userStatus'); ?>" method="post" class="d-inline"> |
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <?php if ($user['status'] == 1) { ?>
                                            <button type="submit" class="btn btn-outline-dark btn-sm"><i class="bi bi-toggle2-on"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-outline-light btn-sm"><i class="bi bi-toggle2-off"></i></button>
                                        <?php } ?>
                                    </form>
                                    <?php if (session()->get('role') == 1) : ?>
                                        <form action="<?= url_to('backend.user.delete'); ?>" method="post" class="d-inline"> |
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Tambah User</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message_add'); ?>
            <form action="<?= url_to('backend.user.insert'); ?>" method="post" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <select id="karyawan_id" name="karyawan_id" class="form-select" autofocus required>
                                    <option value="" selected disabled>Open this select menu</option>
                                    <?php foreach ($karyawan_options as $role_option) : ?>
                                        <option value="<?= $role_option['id']; ?>"><?= strtoupper($role_option['nama_karyawan']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" maxlength="25" class="form-control" autofocus required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL FORM Edit User -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.user.update'); ?>" method="post" id="formEditUser">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <select id="karyawan_id" name="karyawan_id" class="form-select" autofocus required>
                            <option value="" selected disabled>Open this select menu</option>
                            <?php foreach ($karyawan_options as $role_option) : ?>
                                <option value="<?= $role_option['id']; ?>"><?= strtoupper($role_option['nama_karyawan']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label>Username</label>
                            <input type="text" id="username" name="username" maxlength="25" class="form-control" placeholder="Username.." required>
                        </div>
                    </div>
                    <small class="font-weight-bolder">*) Default password = username</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>