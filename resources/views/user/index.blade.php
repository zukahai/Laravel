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
    <img src="{{ url('storage/images/') }}" alt="333" title="" />
    <img src="storage/app/images/gahCdT2onwUp75vO6mKbkmRbxZ55PJulhKPDCrW9.jpg" alt="Heee" />
Trang chủ <br>
Đang đăng nhâ vào tài khoản : <h1>{{Cookie::get('username')}} </h1>
@endsection

@section('menu')
    @include('blocks.header');
@endsection
