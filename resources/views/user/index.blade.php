@extends('layouts.client')

@section('title')
    Trang chủ user
@endsection

@section('menu')
    @include('blocks.header')
@endsection

@section('sidebar')
    @parent
    <h1>Danh sách tài khoản</h1>
@endsection
