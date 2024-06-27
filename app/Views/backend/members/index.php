<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level Member</th>
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
                        <tr>
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
                                        <button type="submit" class="btn btn-outline-dark btn-sm"><i class="bi bi-toggle2-on"></i></button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-outline-light btn-sm"><i class="bi bi-toggle2-off"></i></button>
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

<?= $this->endSection() ?>