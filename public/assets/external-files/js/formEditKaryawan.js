$(".btnEditKaryawan").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#nama_karyawan').trigger('focus');
    });

    const id = $(this).data("id");
    $.ajax({
        url: window.location.origin+'/editKaryawanById',
        data: {
            id: id,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#formEditKaryawan input[type=hidden]").val(data.id);
            $("#nama_karyawan").val(data.nama_karyawan);
            $("#no_telp").val(data.no_telp);
        },
    });
});