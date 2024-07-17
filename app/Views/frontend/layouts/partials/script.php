<script src="<?= base_url(); ?>assets/furni-1.0.0/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/furni-1.0.0/js/tiny-slider.js"></script>
<script src="<?= base_url(); ?>assets/furni-1.0.0/js/custom.js"></script>

<script>
    // autofocus field login
    if ($('#username').val() != '') {
        $("#password").focus();
    } else {
        $("#username").focus();
    }
</script>