@extends('layouts.content')

@section('menu')
    @include('blocks.header');
@endsection

@section('content')
    <div id="login" class="mt-5">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div  class="col-md-12">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label>
                                <input class="border border-info" type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label>
                                <input class="border border-info" type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input  type="submit" name="submit" class="btn btn-dark btn-md" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
