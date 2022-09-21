@extends('admin.layouts.main')
@section('title_page')
    Create Blog - {{ config('app.name') }}
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
        $menu_parent = 'blog';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Create blog
@endsection
@section('title_layout')
    Create blog
@endsection

@section('actions_layout')
@endsection

@section('title_card')
    Thêm blog
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
    <form action="" method="post" class="py-5" enctype="multipart/form-data">
        <h3>Thêm blog</h3>
        @csrf
        @if($errors->any())
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Thông tin chưa hợp lệ</div>
            </div>
        @endif
        <div class="form-group my-2">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề">
            @error('title')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="image">Chọn ảnh</label>
            <input type="file" class="form-control" id="image" name="url_image" placeholder="Chọn ảnh">
            @error('image')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group my-2">
            <label for="detail">Nội dung</label>
            <textarea id="detail" name="content_blog"></textarea>
        </div>

        <div class="justify-content-center d-flex my-5">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
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

