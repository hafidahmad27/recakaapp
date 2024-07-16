<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="buttons">
                <a href="<?= url_to('backend.produk.form_add.view'); ?>" class="btn icon btn-primary"><i class="bi bi-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <?= session()->getFlashdata('message'); ?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="13%">Kode Produk</th>
                        <th width="20%">Nama Produk</th>
                        <th class="text-center">Deskripsi</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $product) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $product['kode_produk'] ?></td>
                            <td><?= $product['nama_produk'] ?></td>
                            <td width="30%" style="text-align: justify;"><?= $product['deskripsi'] ?></td>
                            <td><?= number_format($product['harga_umum'], 0, ',', '.'); ?></td>
                            <td><?= number_format($product['jumlah'], 0, ',', '.'); ?></td>
                            <td class="text-center" width="10%">
                                <a href="<?= base_url(); ?>uploads/<?= $product['foto_produk'] ?>" target="_blank">[Foto]</a>
                            </td>
                            <td width="15%" class="text-center">
                                <button type="button" class="btn btn-primary btn-sm btnEditProduk" data-id="<?= $product['id'] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil"></i></button>
                                <form action="<?= url_to('backend.produk.delete'); ?>" method="post" class="d-inline"> |
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL FORM Edit Produk -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('backend.produk.update'); ?>" method="post" id="formEditProduk">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <!-- <input type="hidden" id="oldName" name="oldName"> -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Kode Produk</label>
                            <input id="kode_produk" name="kode_produk" maxlength="6" class="form-control" required autofocus>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" maxlength="50" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Harga Umum</label>
                            <input type="number" id="harga_umum" name="harga_umum" min="1" maxlength="9" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" min="1" maxlength="5" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label>Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Foto Produk</label>
                            <!-- <input type="hidden" id="oldName" name="oldName"> -->
                            <input type="file" id="foto_produk" name="foto_produk" value="timpa" class="form-control">
                        </div>
                    </div>
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