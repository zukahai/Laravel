@extends('layouts.contentFull')

@section('title')
    Trang chủ
@endsection
@section('content')
    @include('blocks.flash-message')
Trang chủ <br>
Đang đăng nhâ vào tài khoản : <h1>{{Cookie::get('username')}} </h1>
@endsection

@section('menu')
    @include('blocks.header');
@endsection
