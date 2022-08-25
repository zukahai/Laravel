@extends('layouts.client')

@section('menu')
    @include('blocks.header')
@endsection

@section('sidebar')
    @parent
    <h1>Home user</h1>
@endsection

@section('content')
    Xin chào, đây là trang chủ
@endsection