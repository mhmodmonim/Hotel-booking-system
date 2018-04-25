<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('ui/images/icons/logo.png')}}" alt="IMG-LOGO" data-logofixed="{{asset('ui/images/icons/logo2.png')}}">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu mt-3">
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>


                            <li>
                                <a href="{{route('reservation')}}">Reservation</a>
                            </li>



                            @guest
                                <li><a  href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a  href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter m-l-21" aria-hidden="true"></i></a>

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>