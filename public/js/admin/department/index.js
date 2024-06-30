$(document).ready(function () {
    $(".btn-delete").on("click", function () {
        console.log(123);
        if (confirm("Bạn có muốn xóa")) {
            let id = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: `/api/departments/${id}/destroy`,
                data: {
                    _token: 1,
                },
                success: function (response) {
                    if (response.status == 0) {
                        toastr.success("Xóa thành công");
                        $('.row' + id).remove();
                    } else {
                        toastr.error("Xóa thất bại");
                    }
                },
            });
        }
    });
});
