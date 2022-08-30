@extends('admin.layouts.main')
@section('title_page')
    Create Account - Admin - {{ config('app.name') }}
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
        $menu_parent = 'account';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Account
@endsection
@section('title_layout')
    Create Account
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a>
@endsection
@section('title_card')
    Create Account
@endsection
@section('content_card')
{{--    <form action="{{route('admin.account.add')}}" method="post" class="form-control-sm">--}}
{{--        @csrf--}}

{{--        <div class="mb-10">--}}
{{--            <label for="exampleFormControlInput1" class="required form-label">Name Account</label>--}}
{{--            <input name="name" type="text" class="form-control form-control-solid"--}}
{{--                   placeholder="Enter name category" {{old('name')}}>--}}
{{--        </div>--}}
{{--        <div class="mb-10">--}}
{{--            <label for="exampleFormControlInput1" class="required form-label">Parent Account</label>--}}
{{--            <select class="form-select form-select-solid" data-control="select2"--}}
{{--                    data-placeholder="Select parent category" data-select2-id="1" name="parent_id">--}}
{{--                <option value="0">None</option>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="mb-10">--}}
{{--            <label for="exampleFormControlInput1" class="required form-label">Status</label>--}}
{{--            <select class="form-select form-select-solid" data-control="select2"--}}
{{--                    data-placeholder="Select status" data-select2-id="1" name="status">--}}
{{--                <option></option>--}}
{{--                <option value="1">Active</option>--}}
{{--                <option value="0">Inactive</option>--}}
{{--                <option value="2">Pending</option>--}}
{{--                <option value="3">Delete</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="mb-10">--}}
{{--            <label for="exampleFormControlInput1" class="required form-label">Name Account</label>--}}
{{--            <textarea name="description" id="" cols="20" rows="10"--}}
{{--                      class="form-control form-control-solid">{{old('description')}}</textarea>--}}
{{--        </div>--}}
{{--        <div class="mb-10">--}}
{{--            <button class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">--}}
{{--                <i class="fa fa-save"></i> Save--}}
{{--            </button>--}}
{{--        </div>--}}

{{--    </form>--}}
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

