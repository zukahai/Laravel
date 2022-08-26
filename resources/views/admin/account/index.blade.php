@extends('layouts.client')

@section('title')
   Danh sách tài khoản
@endsection

@section('menu')
    @include('blocks.header')
@endsection

@section('sidebar')
    @parent
    <a class="text-danger"><div class="divider"><span></span><span>Test Sidebar</span><span></span></div></a>

@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('Xin chào')"
    @endif

@endsection

@section('content')

    <h5 class="text-center">Danh sách tài khoản</h5>
    <a href="{{route('admin.account.formAdd')}}" class="btn btn-primary mb-2">Thêm tài khoản</a>
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">UserName</th>
            <th scope="col">Created_at</th>
            <th scope="col">Role</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $item)
            <tr class="align-middle">
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->username}}</td>
                <td class="align-middle">{{$item->created_at}}</td>
                <td class="align-middle"><span class="badge {{($item->role == 'admin') ? 'badge-danger': 'badge-success'}}"> {{$item->role}} </span></td>
                <td class="align-center justify-content-center">
                    <a href="{{route('admin.account.update')}}/{{$item->id}}" class="btn btn-success m mx-1 my-1">Sửa</a>
                    <span data-id="{{$item->id}}" class="btn btn-danger mx-1 delete-btn my-1">Xoá</span>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection

@section('js')
    <script>
        function abc(result) {
            if (result !== null) {
                toastr.success(result);
            } else {
                toastr.error("Xóa thất bại");
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
@endsection
