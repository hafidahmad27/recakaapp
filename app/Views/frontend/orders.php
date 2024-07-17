<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="untree_co-section before-footer-section">
	<div class="container">
		<div class="row mb-5">
			<form class="col-md-12" method="post">
				<div class="site-blocks-table">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Tanggal Transaksi</th>
								<th>Kode Transaksi</th>
								<th class="text-end">Total Bayar</th>
								<th class="text-end">Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($orders as $order) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= date('d M Y', strtotime($order['tanggal_transaksi'])) ?></td>
									<td><?= $order['kode_transaksi']; ?></td>
									<td class="text-end"><?= number_format($order['total'] - ($order['diskon'] / 100) * $order['total'], 0, ',', '.') ?></td>
									<td class="text-end">
										<?php if ($order['status'] == null) : ?>
											<i class="fw-bold text-warning">Pending</i>
										<?php elseif ($order['status'] == 0) : ?>
											<i class="fw-bold text-danger">Dibatalkan Penjual</i>
										<?php elseif ($order['status'] == 1) : ?>
											<i class="fw-bold">Berhasil</i>
										<?php endif ?>
									</td>
									<td><a href="<?= url_to('frontend.orders.order_details.view', $order['kode_transaksi']); ?>" class="btn btn-black btn-sm">Detail</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>