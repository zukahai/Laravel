@extends('admin.layouts.main')
@section('title_page')
    Blog - Admin - {{ config('app.name') }}
@endsection

@section('name_user')
    {{(auth()->user()->account->username)}}
@endsection

@section('email_user')
    Tài khoản: {{number_format(auth()->user()->money, 0, '', ',')}} VND
@endsection

@section('role_user')
    @foreach(auth()->user()->account->roles->take(4) as $role)
        <span class="badge badge-light-{{$role->color}} fw-bold fs-8 py-1 mx-auto">{{$role->role_name}}</span>
    @endforeach
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        img{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'blog';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Blog
@endsection
@section('title_layout')
    Blog
@endsection
@section('actions_layout')
    <a href="{{route('admin.blog.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Blog
    </a>
@endsection
@section('title_card')
    List Blog
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

    <h5 class="text-center">Danh sách Blog</h5>
    <a href="{{route('admin.blog.create')}}" class="btn btn-primary mb-2">Thêm blog</a>
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
        @if(!$blogs->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Tiêu đề</th>
                <th class="text-center" scope="col">Hình ảnh</th>
                <th class="text-center" scope="col">Tác giả</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($blogs as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <td class="align-middle text-center">{{$item->title}}</td>
                <td class="align-middle text-center">
                    <img src="{{url($item->url_image)}}" alt="..." class="rounded mx-auto d-block">
                </td>
                <td class="align-middle text-center">{{$item->account->username}}</td>
                <td class="align-center justify-content-center">
                    <a href="{{route('admin.blog.detail', ['id' => $item->id])}}" class="btn btn-icon btn-info btn-sm btn-icon-md btn-circle mx-1"
                       title="Xem">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{route('admin.account.update')}}/{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
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
        {{$blogs->links()}}
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

