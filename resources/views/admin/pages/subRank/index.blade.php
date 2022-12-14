@extends('admin.layouts.main')
@section('title_page')
    Detail Rank - {{ config('app.name') }}
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
    <style>
        img{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endsection
@section('menu')
    @php
        $menu_parent = 'rank';
        $menu_child = 'subrank';
    @endphp
@endsection
@section('title_component')
    Rank
@endsection
@section('title_layout')
    Rank
@endsection

@section('actions_layout')
    <a href="{{route('admin.subrank.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> Thêm chi tiết rank
    </a>
@endsection

@section('title_card')
    List rank
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
    @if ($message = Session::get('warning'))
        onload="abc('{{$message}}' , 'warning')"
    @endif
@endsection

@section('content_card')
    <div class="table-responsive">
    <table class="table search-table-outter">
        <thead>
        @if(!$subranks->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Image</th>
                <th class="text-center" scope="col">SubRank Name</th>
                <th class="text-center" scope="col">Price (VND)</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp
        @forelse ($subranks as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$index++}}</th>
                <td class="align-middle text-center">
                    <img src="{{url($item->rank->url_image)}}" alt="..." class="rounded mx-auto d-block">
                </td>
                <td class="align-middle text-center">{{$item->sub_rank_name}}</td>
                <td class="align-middle text-center">{{number_format($item->price, 0, '', ',')}}</td>
                <td class="align-center justify-content-center">
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

