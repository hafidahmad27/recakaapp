$(".btnEditVoucher").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#kode_voucher').trigger('focus');
    });

    const id = $(this).data("id");
    $.ajax({
        url: window.location.origin+'/editVoucherById',
        data: {
            id: id,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#formEditVoucher input[type=hidden]").val(data.id);
            $("#kode_voucher").val(data.kode_voucher);
            $("#diskon").val(data.diskon);
            $("#tanggal_mulai").val(data.tanggal_mulai);
            $("#tanggal_berakhir").val(data.tanggal_berakhir);
            $("#deskripsi").val(data.deskripsi);
        },
    });
});