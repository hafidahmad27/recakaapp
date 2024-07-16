<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level</th>
                        <th>Nama Member</th>
                        <th>No Telp</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($members as $member) : ?>
                        <tr class="<?= $member['status'] != 0 ? '' : 'bg-dark'; ?>">
                            <td><?= $no++; ?></td>
                            <td><?= $member['nama_level_member']; ?></td>
                            <td><?= $member['nama_member']; ?></td>
                            <td><?= $member['no_telp']; ?></td>
                            <td><?= $member['username']; ?></td>
                            <td>
                                <?php if (password_verify($member['username'], $member['password'])) { ?>
                                    DEFAULT
                                <?php } else { ?>
                                    ********
                                    <form action="<?= url_to('backend.member.resetPassword'); ?>" method="post" class="d-inline float-right">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                        <button type="submit" class="btn btn-light btn-sm"><i class="bi bi-arrow-repeat"></i></button>
                                    </form>
                                <?php } ?>
                            </td>
                            <td width="25%" align="center">
                                <button type="button" class="btn btn-primary btn-sm btnEditMember" data-id="<?= $member['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                <form action="<?= url_to('backend.member.userStatus'); ?>" method="post" class="d-inline"> |
                                    <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                    <?php if ($member['status'] == 1) { ?>
                                        <button type="submit" class="btn btn-outline-light btn-sm"><i class="bi bi-toggle2-on"></i></button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-outline-dark btn-sm"><i class="bi bi-toggle2-off"></i></button>
                                    <?php } ?>
                                </form>
                                <?php if (session()->get('role') == 1) : ?>
                                    <form action="<?= url_to('backend.member.delete'); ?>" method="post" class="d-inline"> |
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL FORM Edit Member -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.member.update'); ?>" method="post" id="formEditMember">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Level</label>
                            <input type="text" id="nama_level_member" class="form-control" required readonly>
                        </div>
                        <div class="form-group col-md-9">
                            <label>Nama Member</label>
                            <input type="text" id="nama_member" name="nama_member" maxlength="50" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label>Username</label>
                            <input type="text" id="username" name="username" maxlength="25" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label>No Telp.</label>
                            <input type="text" id="no_telp" name="no_telp" maxlength="14" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control">
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