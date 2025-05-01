<header>
    <h1 class="header-title">
        <a title="Go to main page" href="{{route('dashboard.index')}}">Laravel blog example</a>
    </h1>
    <div class="header-right">
        @auth
            <p>Welcome back user</p>
        @endauth
        <nav>
            <ul>
                <li>
                    <a href="{{route('dashboard.index')}}">Home</a>
                </li>
                {{--links visible only for NOT logged in users--}}
                @guest
                    <li>
                        <a href="{{route('dashboard.login')}}">Login</a>
                    </li>
                @endguest
                {{--links visible only for logged in users--}}
                @auth

                @endauth
            </ul>
        </nav>
    </div>
</header>
