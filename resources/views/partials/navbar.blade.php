<div>
    <style>
        .navbar-nav {
            display: flex;
            list-style: none;
            justify-content: space-between;
            background-color: #e3f2fd;
        }

        .nav-item {
            padding: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #000;
        }
    </style>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('showContact') }}">Contact</a>
        </li>
        @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{ route('logout') }}>Logout</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href={{ route('login') }}>Login</a>
            </li>
        @endif
    </ul>
</div>
