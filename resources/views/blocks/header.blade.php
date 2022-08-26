<!-- Header -->
<header class="kf-header">

    <!-- topline -->
    <div class="kf-topline">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                <!-- hours -->
                <div class="kf-h-group">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <em>Thời gian hiện tại :</em> {{date('H:i:s d-M-Y')}}
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 align-center">

                <!-- social -->
                <div class="kf-h-social">
                    <a href="https://www.facebook.com/chiatayde"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://github.com/zukahai" target="_blank"><i class="fa fa-github"></i></a>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 align-right">

                <!-- location -->
                <div class="kf-h-group">
                    @if(!empty(Cookie::get('username')))
                    <em>Tài khoản :</em> {{Cookie::get('username')}}
                    <a href="{{route('login')}}" ><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    @else
                        <em>Đăng nhập</em>
                        <a href="{{route('login')}}" ><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- navbar -->
    <div class="kf-navbar">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                <!-- logo -->
                <div class="kf-logo">
                    <a href="{{route('homeUser')}}"><img src="user/images/logo.png" alt="" /></a>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 align-center">

                <!-- main menu -->
                <div class="kf-main-menu">
                    <ul>
                        <li><a href="{{route('homeUser')}}">Trang chủ<i class=""></i></a></li>
                        <li><a href="{{route('admin.account.index')}}">Admin</a></li>
                        <li><a href="/about">Về chúng tôi</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 align-right">
                <!-- menu btn -->
                <a href="#" class="kf-menu-btn"><span></span></a>
            </div>
        </div>
    </div>

    <!-- mobile navbar -->
    <div class="kf-navbar-mobile">

        <!-- mobile menu -->
        <div class="kf-main-menu">
            <ul>
                <li class="has-children">
                    <a href="{{route('homeUser')}}">Trang chủ</a>
                </li>
                <li><a href="{{route('admin.account.index')}}">Admin</a></li>
                <li><a href="/about">Về chúng tôi</a></li>
            </ul>
        </div>

        <!-- mobile topline -->
        <div class="kf-topline">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- mobile btn -->
                    <a href="reservation.html" class="kf-btn h-btn">
                        <span>Book a table</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- social -->
                    <div class="kf-h-social">
                        <a href="facebook.com" target="blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="twitter.com" target="blank"><i class="fab fa-twitter"></i></a>
                        <a href="instagram.com" target="blank"><i class="fab fa-instagram"></i></a>
                        <a href="youtube.com" target="blank"><i class="fab fa-youtube"></i></a>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- hours -->
                    <div class="kf-h-group">
                        <i class="far fa-clock"></i>
                        <em>opening hours :</em> 08:00 am - 09:00 pm
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- location -->
                    <div class="kf-h-group">
                        <i class="fas fa-map-marker-alt"></i>
                        <em>Location :</em> Nhóm Wibucian, thành phố Đà Nẵng
                    </div>

                </div>
            </div>
        </div>

    </div>

</header>
