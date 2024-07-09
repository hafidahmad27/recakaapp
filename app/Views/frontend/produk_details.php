<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="blog-section">
    <div class="container">
        <div class="card mb-3" style="min-height: 345px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">Card title</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mt-4">
                                <h5>Rp </h5>
                            </li>
                            <li class="list-group-item">
                                <h6 style="text-align: justify;">Deskripsi : Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi debitis beatae cum sunt nisi ipsam ab architecto modi, minima voluptatum illum molestias delectus, explicabo inventore, nostrum ratione dicta. Enim, molestias?</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>