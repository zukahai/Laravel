@extends('admin.layouts.main')
@section('title_page')
    Account - Admin - {{ config('app.name') }}
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
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'account';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Account
@endsection
@section('title_layout')
    Account
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a>
@endsection
@section('title_card')
    List Account
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

    <h5 class="text-center">Danh sách tài khoản</h5>
    <a href="{{route('admin.account.formAdd')}}" class="btn btn-primary mb-2">Thêm tài khoản</a>
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
        @if(!$accounts->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">UserName</th>
                <th class="text-center" scope="col">Created_at</th>
                <th class="text-center" scope="col">Role</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($accounts as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <td class="align-middle text-center">{{$item->username}}</td>
                <td class="align-middle text-center">{{$item->created_at}}</td>
                <td class="align-middle text-center">
                    @foreach($item->roles as $role)
                        <span class=" my-1 text-center
                    badge badge-{{$role->color}}"> {{$role->role_name}}</span>
                    @endforeach
                </td>
                {{--                <td class="align-middle text-center"><span class="badge {{($item->role == 'admin') ? 'badge-danger': 'badge-success'}}"> {{$item->role}} </span></td>--}}
                <td class="align-center justify-content-center">
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
        {{$accounts->links()}}
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

