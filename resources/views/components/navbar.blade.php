    <nav class="navbar navbar-expand-lg bg-primary rounded-4 mx-2 mt-2" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand px-2" href="@yield('link-home')">GoMyjlis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link @yield('home-active')" href="@yield('link-home')">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('event-active')" href="@yield('link-event')">Event</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu bg-info" data-bs-theme="light">

                            @auth
                                <a class="dropdown-item @yield('account-active')"
                                    href="@yield('link-account')">{{ Str::ucfirst(auth()->user()->username) }}</a>
                                @if (auth()->user()->is_admin == 1)
                                    <a class="dropdown-item @yield('manageuser-active')" href="@yield('link-manageuser')">Manage User</a>
                                @else
                                    <a class="dropdown-item @yield('myevent-active')" href="@yield('link-myevent')">My Event</a>
                                    <a class="dropdown-item @yield('notification-active')" href="@yield('link-notification')">Notification</a>
                                @endif
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign Out</button>
                                </form>
                            @else
                                <a class="dropdown-item @yield('login-active')" href="@yield('link-login')">Sign In</a>
                            @endauth

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
