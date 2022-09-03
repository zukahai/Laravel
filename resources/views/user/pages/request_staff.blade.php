@extends('user.layouts.main')
@section('title_page')
    Request staff - {{ config('app.name') }}
@endsection
@section('name_user')
    {{(auth()->user()->account->username)}}

@endsection
@section('email_user')
    {{(auth()->user()->account->roles[0]->description)}}
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
        $menu_parent = 'contact';
        $menu_child = 'request';
    @endphp
@endsection
@section('title_component')
    Request
@endsection
@section('title_layout')
    request_staff
@endsection

@section('actions_layout')
@endsection

@section('title_card')
    Yêu cầu làm nhân viên
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
    @if(!empty(auth()->user()->account->requestStaff))
        <div class="row justify-content-center">
            <div class="card bg-info mb-5 col col-lg-6">
                <div class="card-body">
                    <h2 class="card-title">Yêu cầu của bạn</h2>
                    <h6>Tôi của bạn: {{auth()->user()->account->requestStaff->fullname}}</h6>
                    <h6>Ngày sinh: {{auth()->user()->account->requestStaff->birthday}}</h6>
                    <h6>Tin nhắn: {{auth()->user()->account->requestStaff->message}}</h6>
                    <h6>Yêu cầu được tạo lúc: {{auth()->user()->account->requestStaff->updated_at}}</h6>
                    <h6>Trạng thái</h6>
                    <a href="#" class="btn btn-primary">Sửa yêu cầu</a>
                </div>
            </div>
        </div>
    @endif
    <form action="" method="post" class="py-5">
        <h3>Điền thông tin</h3>
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
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ và tên">
            @error('fullname')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="birthday">Ngày sinh</label>
            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Ngày sinh">
            @error('birthday')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="link_facebook">Link facebook</label>
            <input type="text" class="form-control" id="link_facebook" name="link_facebook" placeholder="https://www.facebook.com/username">
            @error('link_facebook')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group my-2">
            <label for="message">Lời nhắn</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="Xin chào admin">
            @error('message')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="justify-content-center d-flex my-5">
            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
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

