@extends('admin.layouts.main')
@section('title_page')
    Account - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
{{--    {{auth()->user()->name}}--}} HaiZuka

@endsection
@section('email_user')
{{--    {{auth()->user()->email}}--}} haizuka@gmail.com
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'role';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Role
@endsection
@section('title_layout')
    Role
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a>
@endsection
@section('title_card')
    Role
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
@endsection

@section('content_card')
    <div>
    <form method="get" action="">
        <div class="input-group mb-5">
            <input type="text" class="form-control" name="keywords" placeholder="Từ khoá tìm kiếm"
                   value="{{request()->keywords}}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    </div>

    <h5 class="text-center">Danh sách vài trò</h5>
    <a href="{{route('admin.account.formAdd')}}" class="btn btn-primary mb-2">Thêm vai trò</a>
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
        @if(!$roles->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Role Name</th>
                <th class="text-center" scope="col">Decription</th>
                <th class="text-center" scope="col">Created_at</th>
                <th class="text-center" scope="col">Role</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($roles as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <td class="align-middle text-center">{{$item->role_name}}</td>
                <td class="align-middle text-center">{{$item->description}}</td>
                <td class="align-middle text-center">{{$item->created_at}}</td>
                <td class="align-middle text-center">{{$item->updated_at}}</td>
                <td class="align-center justify-content-center">
                    <a href="{{route('admin.account.update')}}/{{$item->id}}" class="btn btn-success m mx-1 my-1">Sửa</a>
                    <span data-id="{{$item->id}}" class="btn btn-danger mx-1 delete-btn my-1">Xoá</span>
                </td>
            </tr>
        @empty
            <h1 class="text-light text-center">Không có dữ liệu</h1>
        @endforelse

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-dark">
        {{$roles->links()}}
    </div>
@endsection

@section('footer_card')

@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

@section('jscustom')
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
                        url: "/admin/role/delete/" + id,
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
