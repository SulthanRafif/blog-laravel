        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                <span data-feather="home"></span>
                    Home
                </a>
            </li>
            @auth
             @if (Auth::user()->hasRole('user'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}" href="/blogs">
                <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            @elseif (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin">
                <span data-feather="file-text"></span>
                    Halaman Admin
                </a>
            </li>
             @endif
            @endauth
            </ul>
        </div>
    </nav>