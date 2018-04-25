<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset("ui/images/icons/favicon.png")}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/vendor/lightbox2/css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('ui/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ui/css/main.css')}}">
    <!--===============================================================================================-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="animsition">
@include('layouts.header')
    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel ">--}}
            {{--<div class="container">--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav mr-auto">--}}

                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav ml-auto">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>--}}
                            {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
                        {{--@else--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--{{ __('Logout') }}--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                        {{--@csrf--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--<main class="py-4">--}}
            @yield('content')
        {{--</main>--}}
</body>



    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('ui/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ui/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ui/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/parallax100/parallax100.js')}}"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('ui/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('ui/js/main.js')}}"></script>
</body>
</html>
