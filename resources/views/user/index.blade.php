@extends('layouts.client')

@section('title')
    Danh sách tài khoản
@endsection

@section('menu')
    @include('blocks.header')
@endsection

@section('sidebar')
    @parent
    <h1>Danh sách tài khoản</h1>
@endsection

@section('content')
    <h5 class="text-center">Danh sách tài khoản</h5>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">UserName</th>
        <th scope="col">Created_at</th>
        <th scope="col">Update_at</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->username}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->update_at}}</td>
            <td class="align-center justify-content-center">
                <a href="admin/typeProduct/edit/${item.id}" class="btn btn-success m mx-1">Sửa</a>
                <span data-id="{{$item->id}}" class="btn btn-danger mx-1 delete-btn">Xoá</span>
            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection

@section('js')
<script>
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
@endsection