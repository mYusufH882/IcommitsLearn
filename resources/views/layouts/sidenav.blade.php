<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
    </div>
    <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : "" }}" href="{{ route('home') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('siswa*') ? 'active' : "" }}" href="{{ route('siswa.index') }}">
                    <i class="ni ni-circle-08 text-info"></i>
                    <span class="nav-link-text">Master Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profil') }}">
                    <i class="ni ni-single-02 text-yellow"></i>
                    <span class="nav-link-text">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run text-warning"></i>
                    <span class="nav-link-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-send text-dark"></i>
                    <span class="nav-link-text">Upgrade</span>
                </a>
            </li> --}}
        </ul>
        </div>
    </div>
    </div>
</nav>
