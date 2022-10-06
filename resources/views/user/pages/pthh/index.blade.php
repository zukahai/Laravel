@extends('user.layouts.main')
@section('title_page')
    PTHH - {{ config('app.name') }}
@endsection

@section('name_user')
    @if(auth()->user() != null)
        {{(auth()->user()->account->username)}}
    @endif
@endsection

@section('email_user')
    @if(auth()->user() != null)
        Tài khoản: {{number_format(auth()->user()->money, 0, '', ',')}} VND
    @endif
@endsection

@section('role_user')
    @if(auth()->user() != null)
        @foreach(auth()->user()->account->roles->take(4) as $role)
            <span class="badge badge-light-{{$role->color}} fw-bold fs-8 py-1 mx-auto">{{$role->role_name}}</span>
        @endforeach
    @endif
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection

@section('menu')
    @php
        $menu_parent = '';
        $menu_child = '';
    @endphp
@endsection

@section('title_component')
    PTHH
@endsection

@section('title_layout')
    PTHH
@endsection

@section('actions_layout')

@endsection

@section('title_card')
    Profile
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
    Hello PTHH
    <form action="" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="money">Phường trình</label>
            <input type="text" class="form-control" id="pthh" name="pthh" placeholder="Phương trình" value="H2 + O2 = H2O">
            @error('money')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="justify-content-center d-flex my-5">
            <button type="submit" class="btn btn-primary">Submit</button>
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

