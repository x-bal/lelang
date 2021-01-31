<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard"><img src="{{asset('images') }}/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class='sidebar-hide d-xl-none d-block'><i class='bi bi-x bi-middle'></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Menu</li>

                <li class="sidebar-item">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->level_id == 1)
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{ route('users.index') }}">Data Users</a>
                        </li>
                        <li>
                            <a href="{{ route('level.index') }}">Data Level</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('petugas.index') }}" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>Data Petugas</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('masyarakat.index') }}" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>Data Masyarakat</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('barang.index') }}" class='sidebar-link'>
                        <i class="fas fa-briefcase"></i>
                        <span>Data Barang</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('lelang.index') }}" class='sidebar-link'>
                        <i class="fab fa-uncharted"></i>
                        <span>Data Lelang</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-item">
                    <a href="" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>