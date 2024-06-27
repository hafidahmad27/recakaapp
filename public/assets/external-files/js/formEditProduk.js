$(".btnEditMember").on("click", function() {
    $('#staticBackdrop').on('shown.bs.modal', function() {
        $('#item_name').trigger('focus');
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
            $("#item_name").val(data.item_name);
            $("#price").val(data.price);
            $("#description").val(data.description);
            $("#category_id").val(data.category_id);
        },
    });
});