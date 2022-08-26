@extends('layouts.client')

@section('title')
   Danh sách tài khoản
@endsection

@section('menu')
    @include('blocks.header')
@endsection

@section('sidebar')
    @parent
    <a class="text-danger"><div class="divider"><span></span><span>Test Sidebar</span><span></span></div></a>

@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
@endsection

@section('content')

    <h5 class="text-center">Danh sách tài khoản</h5>
    <a href="{{route('admin.account.formAdd')}}" class="btn btn-primary mb-2">Thêm tài khoản</a>
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">UserName</th>
            <th scope="col">Created_at</th>
            <th scope="col">Role</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $item)
            <tr class="align-middle">
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->username}}</td>
                <td class="align-middle">{{$item->created_at}}</td>
                <td class="align-middle"><span class="badge {{($item->role == 'admin') ? 'badge-danger': 'badge-success'}}"> {{$item->role}} </span></td>
                <td class="align-center justify-content-center">
                    <a href="{{route('admin.account.update')}}/{{$item->id}}" class="btn btn-success m mx-1 my-1">Sửa</a>
                    <span data-id="{{$item->id}}" class="btn btn-danger mx-1 delete-btn my-1">Xoá</span>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-dark">
        {{$accounts->links()}}
    </div>
@endsection

