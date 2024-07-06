$(".btnEditMember").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#nama_member').trigger('focus');
    });

    const id = $(this).data("id");
    $.ajax({
        url: window.location.origin+'/editMemberById',
        data: {
            id: id,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#formEditMember input[type=hidden]").val(data.id);
            $("#nama_level_member").val(data.nama_level_member || "Umum");
            $("#nama_member").val(data.nama_member);
            $("#username").val(data.username);
            $("#no_telp").val(data.no_telp);
        },
    });
});