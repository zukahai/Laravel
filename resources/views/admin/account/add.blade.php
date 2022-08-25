@extends('layouts.client')

@section('title')
    Thêm tài khoản
@endsection

@section('menu')
    @include('blocks.header');
@endsection

@section('content')
    <form action="{{route('admin.account.add')}}" method="post">
        @csrf
        @if($errors->any())
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Thông tin chưa hợp lệ</div>
            </div>
        @endif
        <div class="form-group">
            <label for="username">Tên tài khoản</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản">
            @error('username')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
            @error('password')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
{{--        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">--}}
        <div class="justify-content-center d-flex">
            <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
        </div>
    </form>
@endsection
