<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level Member</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($member_level as $level) : ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <!-- FORM UPDATE START -->
                            <form action="<?= url_to('backend.member_level.update'); ?>" method="post" class="d-inline">
                                <td>
                                    <div style="display: none;"><?= $level['nama_level_member']; ?></div>
                                    <input type="text" name="nama_level_member" maxlength="6" class="form-control" value="<?= $level['nama_level_member']; ?>">
                                </td>

                                <!-- TD ACTION (UPDATE & DELETE) START -->
                                <td align="center">
                                    <input type="hidden" name="id" value="<?= $level['id'] ?>">
                                    <button type="submit" class="btn icon btn-primary btn-sm"><i class="bi bi-pencil"></i> Update</button>
                            </form>
                            <!-- /.FORM UPDATE END -->

                            <form action="<?= url_to('backend.member_level.delete'); ?>" method="post" class="d-inline"> |
                                <input type="hidden" name="id" value="<?= $level['id'] ?>">
                                <button type="submit" class="btn icon btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            </td><!-- /.TD ACTION (UPDATE & DELETE) END -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Tambah Level Member</h4>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message_add'); ?>
            <form action="<?= url_to('backend.member_level.insert'); ?>" method="post" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Level Member</label>
                                <input type="text" name="nama_level_member" maxlength="30" class="form-control" autofocus required>
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

<?= $this->endSection() ?>