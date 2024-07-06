$(".btnEditProduk").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#nama_produk').trigger('focus');
    });

    const id = $(this).data("id");
    $.ajax({
        url: window.location.origin+'/editProdukById',
        data: {
            kode_produk: id,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#formEditProduk input[type=hidden]").val(data.id);
            $("#kode_produk").val(data.kode_produk);
            $("#nama_produk").val(data.nama_produk);
            $("#harga_umum").val(data.harga_umum);
            $("#jumlah").val(data.jumlah);
            $("#deskripsi").val(data.deskripsi);
            $("#oldName").val(data.foto_produk);
            $("#foto_produk").val(data.foto_produk);
        },
    });
});