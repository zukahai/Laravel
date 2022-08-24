@extends('layouts.client')


@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent {{-- Kế thừa sidebar cũ--}}
    <h2>Sidebar 2</h2>
@endsection

@section('content')
    @for ($i = 0; $i < 10; $i++)
        <h1>dd</h1>
    @endfor
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