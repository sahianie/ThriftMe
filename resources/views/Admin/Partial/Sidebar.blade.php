<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion " id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link " href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-tachometer-alt"></i></div>
                    <b class="sidecontent"> Dashboard</b>
                </a>
                
                <a class="nav-link " href="{{ route('index.category') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-tachometer-alt"></i></div>
                    <b class="sidecontent"> Category </b>
                </a>

                <a class="nav-link " href="{{ route('index.rental') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-tachometer-alt"></i></div>
                    <b class="sidecontent"> Rental </b>
                </a>

                <a class="nav-link " href="{{ route('index.thrift') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-tachometer-alt"></i></div>
                    <b class="sidecontent"> Thrift </b>
                </a>
                
            </div>
        </div>
    </nav>
</div>
