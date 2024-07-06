$(".btnEditHarga").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#harga_khusus').trigger('focus');
    });

    const id = $(this).data("id");
    $.ajax({
        url: window.location.origin+'/editHargaById',
        data: {
            id: id,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#formEditHarga input[type=hidden]").val(data.id);
            $("#produk_nama").val(data.nama_produk);
            $("#harga_umum").val(data.harga_umum);
            $("#harga_khusus").val(data.harga_khusus);
            $("#member_level_id").val(data.member_level_id);
        },
    });
});