<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    @yield('css')

</head>
<body>
    
    @yield('menu')
    
    <main class="py-5">
        <div class="container py-5 mt-5">
            <div class="row">
                <div class="col-0 col-lg-3 card my-1 mx-auto">
                    <div class="card-body">
                        <aside>
                            @section('sidebar')
                                @include('blocks.sidebar')
                            @show
                        </aside>
                    </div>
                </div>
                <div class="col-12 col-lg-8 card my-1">
                    <div class="card-body">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    @include('blocks.footer')

    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.js')}}"></script>
    <script src="{{asset('assets/js/splitting.js')}}"></script>
    <script src="{{asset('assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('assets/js/parallax.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrolla.js')}}"></script>
    <script src="{{asset('assets/js/skrollr.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>

    @yield('js')
</body>
</html>