<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : ''; ?></title>

    <?= $this->include('backend/layouts/partials/head') ?>
</head>

<body>
    <div id="app">
        <?= $this->include('backend/layouts/partials/sidebar') ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last hidediv">
                            <h3><?= isset($content_header) ? $content_header : ''; ?></h3>
                            <!-- <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables.</p> -->
                        </div>
                        <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div> -->
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <?= $this->renderSection('content') ?>
                    </div>
                </section>
            </div>
            <?= $this->include('backend/layouts/partials/footer') ?>
        </div>
    </div>
    <?= $this->include('backend/layouts/partials/script') ?>
</body>

</html>