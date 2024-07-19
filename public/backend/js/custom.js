//sweet alert delete button

$("#dataTable").on("click", ".action", function () {
    let data = $(this).data();
    let id = data.id;
    let type = data.type;
    var route = data.route;
    if (type == "delete") {
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Menghapus data ini bersifat permanen",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: route,
                    method: "DELETE",
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        //reload table
                        $("#dataTable").DataTable().ajax.reload();
                        // Do something with the result
                        if (res.status === "success") {
                            Swal.fire({
                                title: "Deleted!",
                                text: res.message,
                                icon: "success",
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: res.message,
                                icon: "error",
                            });
                        }
                    },
                });
            }
        });
    }
    // if (type == "show") {
    //     $.ajax({
    //         method: "GET",
    //         url: route,
    //         success: function (res) {
    //             $("#showmodal").find(".modal-content").html(res);
    //             $("#showmodal").modal("show");
    //         },
    //     });
    // }
});
