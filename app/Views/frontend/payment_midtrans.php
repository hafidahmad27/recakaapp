<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="row mt-4">
    <div class="col-md-12 text-center">
        <button id="pay-button" class="btn btn-primary">Pay Now</button>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= \App\Config\Midtrans::getClientKey(); ?>"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        window.snap.pay('<?= $snapToken ?>'); // Trigger snap popup. Replace it with your server's response snap token
    });
</script>

<?= $this->endSection() ?>