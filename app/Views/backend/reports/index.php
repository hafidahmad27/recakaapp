<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <p>Filter Date Range</p>
        <form>
            <div class="input-group">
                <input type="date" class="form-control flatpickr-range-preloaded" placeholder="Select date..">
                <button type="submit" class="btn btn-primary"><i class="bi bi-funnel"></i> Filter</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <?= session()->getFlashdata('message'); ?>
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Member</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>TRX24060001</td>
                <td>Mr. Bean</td>
                <td>2024-06-18</td>
                <td>Sukses</td>
                <td>100.000</td>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>