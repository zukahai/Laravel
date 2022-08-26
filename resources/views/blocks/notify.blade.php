<script>
    function abc(result, type) {
        if (result !== null) {
            if (type === 'success')
                toastr.success(result);
            if (type === 'danger')
                toastr.error(result);
            if (type === 'warning')
                toastr.warning(result);
            if (type === 'info')
                toastr.info(result);
        }
    };
    //handle on click delete-btn
    $(document).on("click", ".delete-btn", function () {
        var row = $(this).closest("tr");
        var id = $(this).attr("data-id");
        console.log(id);

        swal.fire({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Sau khi xóa, bạn sẽ không thể phục hồi dữ liệu này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Hủy bỏ"
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: "/admin/account/delete/" + id,
                    type: "GET",
                    success: function (result) {
                        if (result !== null) {
                            toastr.success("Xóa thành công");
                            row.remove();
                        } else {
                            toastr.error("Xóa thất bại");
                        }
                    }
                })
            }
        });
    });
</script>
