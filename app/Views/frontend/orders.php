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
								<th>Produk</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									1
								</td>
								<td class="product-name">
									<h2 class="h5 text-black">Product 1</h2>
								</td>
								<td>$49.00</td>
								<td>10</td>
								<td>$49.00</td>
								<td><a href="<?= url_to('frontend.orders.order_details.view'); ?>" class="btn btn-black btn-sm">Detail</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>