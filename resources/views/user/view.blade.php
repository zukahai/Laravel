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

@section('css')
    <style type="text/css">
        body{
            background: rgb(0, 173, 145);
            color: #fa2;
        }
        header{
            background: rgb(0, 32, 36);
            color: rgb(152, 235, 250);
        }
    </style>
@endsection