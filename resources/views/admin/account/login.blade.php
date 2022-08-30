@extends('layouts.content')

@section('menu')
    @include('blocks.header');
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
{{--    <div id="login" class="mt-5">--}}
{{--        <div class="container">--}}
{{--            <div id="login-row" class="row justify-content-center align-items-center">--}}
{{--                <div  class="col-md-12">--}}
{{--                    <div id="login-box" class="col-md-12">--}}
{{--                        <form id="login-form" class="form" action="" method="post">--}}
{{--                            @csrf--}}
{{--                            <h3 class="text-center text-info">Đăng nhập</h3>--}}
{{--                            @include('blocks.flash-message')--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="username" class="text-info">Tài khoản:</label>--}}
{{--                                <input class="border border-info" type="text" name="username" id="username" class="form-control--}}
{{--                                value="{{old('username')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="password" class="text-info">Mật khẩu:</label>--}}
{{--                                <input class="border border-info" type="password" name="password" id="password" class="form-control"--}}
{{--                                       value="{{old('password')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group d-flex justify-content-center">--}}
{{--                                <label for="remember-me" class="text-info"><span>Lưu thông tin</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>--}}
{{--                            </div>--}}
{{--                            <div class="form-group d-flex justify-content-center mb-5">--}}
{{--                                <input  type="submit" name="submit" class="btn btn-dark btn-md" value="Đăng nhập">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                    type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                    type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
