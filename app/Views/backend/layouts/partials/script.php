<script src="<?= base_url(); ?>assets/mazer/static/js/initTheme.js"></script>
<script src="<?= base_url(); ?>assets/mazer/static/js/components/dark.js"></script>
<script src="<?= base_url(); ?>assets/mazer/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>assets/mazer/compiled/js/app.js"></script>
<script src="<?= base_url(); ?>assets/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url(); ?>assets/mazer/static/js/pages/simple-datatables.js"></script>
<script src="<?= base_url(); ?>assets/mazer/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/mazer/extensions/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url(); ?>assets/mazer/static/js/pages/date-picker.js"></script>


<!-- External JavaScript Files Loader -->
<script src="<?= base_url(); ?>assets/external-files/js/formEditMember.js"></script>
<script src="<?= base_url(); ?>assets/external-files/js/formEditProduk.js"></script>
<script src="<?= base_url(); ?>assets/external-files/js/formEditUser.js"></script>

<script>
    // autofocus field login
    if ($('#username').val() != '') {
        $("#password").focus();
    } else {
        $("#username").focus();
    }
</script>