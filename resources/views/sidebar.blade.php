
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">E-Lib</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <a class="btn btn-danger btn-sm" href="{{route('logout')}}">Logout</a>
            </ul>
        </nav>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('siswa')}}">Siswa</a>
                                    <a class="nav-link" href="{{route('kelas')}}">Kelas</a>
                                    <a class="nav-link" href="{{route('semester')}}">semester</a>
                                </nav>
                            </div>
                                    <a class="nav-link collapsed" href="{{route('buku')}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                        Buku
                                    </a>
                                    <a class="nav-link collapsed" href="{{route('peminjaman')}}">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-pen-to-square"></i></div>
                                        peminjaman
                                    </a>
                        </div>
                    </div>
                     </nav>
            </div>
</div>

