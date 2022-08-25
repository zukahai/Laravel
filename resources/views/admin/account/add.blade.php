@extends('layouts.client')

@section('title')
    Thêm tài khoản
@endsection

@section('menu')
    @include('blocks.header');
@endsection

@section('content')
    <form action="{{route('admin.account.add')}}" method="post">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger"> Looxi</div>
        @endif
        <div class="form-group">
            <label for="username">Tên tài khoản</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản">
            @error('username')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
        </div>
{{--        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">--}}
        <button type="submit" class="btn btn-primary ">Thêm tài khoản</button>
    </form>
@endsection
