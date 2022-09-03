@extends('admin.layouts.main')
@section('title_page')
    Requests staff - Admin - {{ config('app.name') }}
@endsection

@section('name_user')
    {{(auth()->user()->account->username)}}

@endsection

@section('email_user')
{{--    {{auth()->user()->email}}--}} haizuka@gmail.com
@endsection

@section('role_user')
    @foreach(auth()->user()->account->roles->take(4) as $role)
        <span class="badge badge-light-{{$role->color}} fw-bold fs-8 py-1 mx-auto">{{$role->role_name}}</span>
    @endforeach
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'staff';
        $menu_child = 'request';
    @endphp
@endsection
@section('title_component')
    Requests staff
@endsection
@section('title_layout')
    Danh sách yêu cầu
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Staff
    </a>
@endsection
@section('title_card')
    Danh sách yêu cầu
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

    <h5 class="text-center">Danh sách yêu cầu</h5>

    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
        @if(!$requets->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">User Name</th>
                <th class="text-center" scope="col">Full Name</th>
                <th class="text-center" scope="col">Birthday</th>
                <th class="text-center" scope="col">Facebook</th>
                <th class="text-center" scope="col">Time</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($requets as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <th class="align-middle text-center" scope="row">
                    <a href="{{route('admin.account.index', ['keywords'=>$item->account->username])}}">{{$item->account->username}}</a>
                </th>
                <th class="align-middle text-center" scope="row">{{$item->fullname}}</th>
                <th class="align-middle text-center" scope="row">{{date('d-m-Y', strtotime($item->birthday))}}</th>
                <td class="d-flex justify-content-center">
                    <a href="{{url($item->link_facebook)}}" class="btn btn-icon btn-primary btn-sm btn-icon-md btn-circle mx-1"
                       title="Facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </td>
                <th class="align-middle text-center" scope="row">{{$item->updated_at}}</th>
                <td class="align-center justify-content-center">

                    <a href="{{route('admin.role.showedit')}}/{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
                       title="Đồng ý">
                        <i class="fa-regular fa-circle-check"></i>
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
        {{$requets->links()}}
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

