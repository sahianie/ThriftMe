<nav class="sb-topnav navbar navbar-expand navbar-dark header">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" id="shelter" ><b>ThriftMe</b></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ">
        <li class="nav-item dropdown ">
            @if (Auth::check() && Auth::user()->role == 'admin')
        <li class="nav-item px-1 ">
            <a class="nav-link px-4  sidecontent" id="navbarDropdownMenuLink" href="#" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw  sidecontent"></i> <b class="sidecontent">{{ Auth::user()->name }}</b>
            </a>
            <div class="dropdown-menu  dropdown-menu-end text-center text-lg-start shadow-sm" aria-labelledby="navbarDropdownMenuLink">
                
                <a class="dropdown-item profile " href="{{ route('logout') }}">  <i class="fas fa-sign-out-alt me-2"></i>Logout</a>

            </div>
        </li>
    @else
        <li class="nav-item px-1">
            <a class="" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        </li>
            @endif
        </li>
    </ul>
</nav>
