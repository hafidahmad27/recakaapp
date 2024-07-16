<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="untree_co-section before-footer-section">
	<div class="container">

		<div class="row mb-5">
			<div class="col-md-12">
				<div class="site-blocks-table">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Produk</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($keranjang as $cart) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td class="product-name">
										<h2 class="h5 text-black"><?= $cart['nama_produk']; ?></h2>
									</td>
									<td><?= number_format($cart['harga_umum'], 0, ',', '.') ?></td>
									<td>
										<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
											<div class="input-group-prepend">
												<button class="btn btn-outline-black decrease" type="button">&minus;</button>
											</div>

											<div class="input-group-append">
												<button class="btn btn-outline-black increase" type="button">&plus;</button>
											</div>
										</div>
									</td>
									<td><?= number_format($cart['harga_umum'] * $cart['jumlah'], 0, ',', '.') ?></td>
									<td>
										<form action="<?= url_to('frontend.keranjang.deleteFromCart'); ?>" method="post">
											<input type="hidden" name="id" value="<?= $cart['id'] ?>">
											<button type="submit" class="btn icon btn-danger btn-sm">X</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="row mb-5">
					<div class="col-md-6 mb-3 mb-md-0">
						<button type="submit" class="btn btn-black btn-sm btn-block">Update Cart</button>
					</div>
					<div class="col-md-6">
						<a href="<?= url_to('frontend.produk.view'); ?>" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 pl-5">
				<div class="row justify-content-end">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12 text-right border-bottom mb-5">
								<h3 class="text-black h4 text-uppercase">Cart Totals</h3>
							</div>
						</div>
						<!-- <div class="row mb-3">
							<div class="col-md-6">
								<span class="text-black">Subtotal</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black">$230.00</strong>
							</div>
						</div> -->
						<div class="row mb-5">
							<div class="col-md-6">
								<span class="text-black">Total</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black"><?= number_format($total_harga_keranjang, 0, ',', '.'); ?></strong>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<form action="<?= url_to('frontend.keranjang.checkout'); ?>" method="post">
									<input type="hidden" name="kode_transaksi" value="<?= $display_kode_transaksi ?>">
									<button type="submit" class="btn btn-black btn-lg py-3 btn-block <?= $total_harga_keranjang == 0 ? 'disabled' : ''; ?>">Proceed To Checkout</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>