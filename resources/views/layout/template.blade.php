<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        @auth
            <span class="fs-4">{{Auth::user()->name}}</span>
        @endauth
        @guest
            {{Auth::user()->name}}
        @endguest
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
            Home
            </a>
        </li>
        <li>
            <a href="{{ route("user.show")}}" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
            Users
            </a>
        </li>
        <li>
            <a href="{{ route("auth.index") }}" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            Posts
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>more</strong>
        </a>
        @guest
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="{{ route('user.login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('user.register') }}">Sing Up</a></li>
            </ul>
        @endguest
        @auth
            <form action="{{ route("auth.destroy") }}" method="POST">
                @csrf
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><button class="dropdown-item" type="submit">Logout</button></li>
                </ul>
            </form>
        @endauth
    </div>
</div>
@yield('content')  