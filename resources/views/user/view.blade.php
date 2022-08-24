@extends('layouts.client')

@section('content')
    <h1>Trang view</h1>
@endsection

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h2>Sidebar 2</h2>
@endsection