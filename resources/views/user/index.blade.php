@extends('layouts.contentFull')

@section('title')
    Trang chủ
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

@section('content')
    @include('blocks.flash-message')
Trang chủ <br>
Đang đăng nhâ vào tài khoản : <h1>{{Cookie::get('username')}} </h1>
@endsection

@section('menu')
    @include('blocks.header');
@endsection
