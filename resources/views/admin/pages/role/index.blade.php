@extends('admin.layouts.main')
@section('title_page')
    Role - Admin - {{ config('app.name') }}
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
    <a href="{{route('admin.role.showcreate')}}" class="btn btn-primary mb-2">Thêm vai trò</a>
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
                <th class="text-center" scope="col">Quantity</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($roles as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <td class="align-middle text-center">
                    <span class=" my-1 text-center
                    badge badge-{{$item->color}}"> {{$item->role_name}}</span>
                </td>
                <td class="align-middle text-center">{{$item->description}}</td>
                <td class="align-middle text-center">{{count($item->accounts)}}</td>
                <td class="align-center justify-content-center">

                    <a href="{{route('admin.role.detail', ['id' => $item->id])}}" class="btn btn-icon btn-info btn-sm btn-icon-md btn-circle mx-1"
                       title="Chi tiết">
                        <i class="fa fa-asterisk"></i>
                    </a>

                    <a href="{{route('admin.role.showedit')}}/{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
                       title="Sửa">
                        <i class="fa fa-edit"></i>
                    </a>

                    <span class="btn btn-icon btn-danger delete-btn btn-sm btn-icon-md btn-circle mx-1"
                          data-toggle="tooltip" data-placement="top" data-id="{{$item->id}}" title="Xóa">
                                    <i class="fa fa-trash"></i>
                                </span>
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

