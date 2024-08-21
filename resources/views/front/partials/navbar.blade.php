<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Vacation<span>Rental</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('home-active')"><a href="{{ route('front.index') }}"
                        class="nav-link">Home</a></li>
                <li class="nav-item @yield('about-active')"><a href="{{ route('front.about') }}"
                        class="nav-link">About</a>
                </li>
                <li class="nav-item @yield('service-active')"><a href="{{ route('front.service') }}"
                        class="nav-link">Services</a>
                </li>
                <li class="nav-item @yield('room-active')"><a href="{{ route('front.rooms') }}" class="nav-link">
                        Rooms</a>
                </li>
                <li class="nav-item @yield('contact-active')"><a href="{{ route('front.contact') }}"
                        class="nav-link">Contact</a>
                </li>
                @if(!Auth::guard('web')->check())
                <li class="nav-item @yield('register-active')"><a href="{{ route('register') }}"
                        class="nav-link">Register</a></li>
                <li class="nav-item @yield('login-active')"><a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>



                @else
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">{{ Auth::guard('web')->user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <a href="{{ route('front.bookings') }}" class="dropdown-item" <span
                                    class="align-middle">My Bookings</span>
                                </a>

                                <a href="javascript:{}" class="dropdown-item"
                                    onclick="this.closest('form').submit();return false;">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>

                @endif



            </ul>
        </div>
    </div>
</nav>
