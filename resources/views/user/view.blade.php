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

@section('menu')
    @include('blocks.header')
@endsection
