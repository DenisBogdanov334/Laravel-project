<nav class="navbar navbar-inverse">
    <a class="navbar-brand" style="font-size: 30px; color: white" href="/">DaBlog</a>
    <button class="button" onclick="location.href='{{ url('/dashboard') }}'">Home</button>
    <button class="button" onclick="location.href='{{ url('posts') }}'">Blogs</button>
    <button class="button" onclick="location.href='{{ url('about') }}'">About</button>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="button" style="font-size: 20px" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="button" style="font-size: 20px" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="nav-barDropdown" class="button" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-barDropdown">
                    <a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a>
                    <a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-sign-out"></i>Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        @endguest
    </ul>
</nav>