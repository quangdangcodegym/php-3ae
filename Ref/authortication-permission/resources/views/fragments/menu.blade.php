<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light container menu-app">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>


                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About</a>
            </div>
        </div>
        <div class="profile">
            @if(auth()->user())
            <a class="profile-menu-title">Quang Đặng</a>
            <ul class="dropdown-menu profile-menu-list" aria-labelledby="dropdownMenuButton1">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" onclick="event.preventDefault();
                                            this.closest('form').submit();" href="{{ route('logout') }}">Logout</a>
                    </form>
                </li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            @else
            <a class="profile-menu-title" href="{{ Route('logini')}}">Login</a>
            @endif

        </div>

    </nav>
</div>

<div>

</div>