<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>Autozone: @yield('title')</title>
    @yield('styles')

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            @if(\App\Models\Info::first())
                <ul class="header-links pull-left">
                    <li><a href="{{route('contacts')}}"><i class="fa fa-phone"></i> {{\App\Models\Info::first()->phone}}
                        </a></li>
                    <li><a href="{{route('contacts')}}"><i
                                class="fa fa-envelope-o"></i> {{\App\Models\Info::first()->email}}</a></li>
                    <li><a href="{{route('contacts')}}"><i
                                class="fa fa-map-marker"></i> {{\App\Models\Info::first()->address}}</a></li>
                </ul>
            @endif
            <ul class="header-links pull-right">
                @auth
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-user-o"></i>{{Auth::user()->name}}</a></li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    @if(\App\Models\Info::first())
                        @if(\App\Models\Info::first()->image)
                        <div class="header-logo">
                            <a href="{{ route('index') }}" class="logo">
                                <img src="{{Storage::url(\App\Models\Info::first()->image)}}" alt="">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-9 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Кошик</span>
                                @if(session()->has('orderId'))
                                    @if(session()->get('count') > 0)
                                        <div class="qty">{{session()->get('count')}}</div>
                                    @endif
                                @endif
                            </a>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href="{{route('index')}}">Головна</a></li>
                <li><a href="{{route('shop')}}">Сторінка магазину</a></li>
                <li><a href="{{route('basket')}}">Кошик</a></li>
                @if (Route::has('login'))
                    @auth
                        @admin
                        <li><a href="{{ route('dashboard') }}">Адміністративна панель</a></li>
                    @else
                        <li><a href="{{ route('profile.edit') }}">Профіль</a></li>
                        @endadmin
                        @else
                            <li><a href="{{ route('login') }}">Увійти</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Зареєструватися</a></li>
                            @endif
                        @endauth
                    @endif
                    <li><a href="{{route('contacts')}}">Контакти</a></li>
                    <li><a href="{{route('about')}}">О нас</a></li>
                    <li><a href="{{route('policy')}}">Політика магазину</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
@if(session()->has('success'))
    <div style="text-align: center" class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
@elseif(session()->has('warning'))
    <div style="text-align: center" class="alert alert-warning" role="alert">
        {{session()->get('warning')}}
    </div>
@endif
@yield('content')
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        @if(\App\Models\Info::first())
                            <h3 class="footer-title">About Us</h3>
                            <p>{{\App\Models\Info::first()->short_description}}</p>
                            <ul class="footer-links">
                                <li><a href="{{route('contacts')}}"><i
                                            class="fa fa-map-marker"></i> {{\App\Models\Info::first()->address}}</a>
                                </li>
                                <li><a href="{{route('contacts')}}"><i
                                            class="fa fa-envelope-o"></i> {{\App\Models\Info::first()->email}}</a></li>
                                <li><a href="{{route('contacts')}}"><i
                                            class="fa fa-phone"></i> {{\App\Models\Info::first()->phone}}</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="footer">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Категорії</h3>
                            <ul class="footer-links">
                                @foreach(\App\Models\Category::all() as $category)
                                    <li><a href="{{route('category', $category->code)}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Інформація</h3>
                            <ul class="footer-links">
                                <li><a href="{{route('contacts')}}">Контакти</a></li>
                                <li><a href="{{route('about')}}">О нас</a></li>
                                <li><a href="{{route('policy')}}">Політика магазину</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Сервіси</h3>
                            <ul class="footer-links">
                                <li><a href="{{route('profile.edit')}}">Мій аккаунт</a></li>
                                <li><a href="{{route('profile-orders')}}">Мої замовлення</a></li>
                                <li><a href="{{route('basket')}}">Кошик</a></li>
                                <li><a href="{{route('contacts')}}">Допомога</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/nouislider.min.js"></script>
<script src="/js/jquery.zoom.min.js"></script>
<script src="/js/main.js"></script>


</body>
</html>
