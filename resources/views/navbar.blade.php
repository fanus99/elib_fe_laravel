 <!-- Navbar-->
 <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('wellcome')}}">
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
                                    <a class="nav-link" href="{{route('Rakbuku')}}">Rak Buku</a>
                                    <a class="nav-link" href="{{route('bahasa')}}">Bahasa</a>
                                    <a class="nav-link" href="{{route('buku')}}">Buku</a>
                                    <a class="nav-link" href="{{route('gmd')}}">kode gmd</a>
                                    <a class="nav-link" href="{{route('tipekoleksi')}}">Tipe Koleksi</a>
                                    <a class="nav-link" href="{{route('peminjaman')}}">peminjaman</a>
                                    <a class="nav-link" href="{{route('ddc')}}">kode ddc</a>
                                    <a class="nav-link" href="{{route('kodeeksemplar')}}">kode eksemplar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Daftar Pustaka
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="{{route('kelassiswa')}}">
                                        Kelas Siswa
                                    </a>
                                    <a class="nav-link collapsed" href="{{route('eksemplarbuku')}}">
                                        Eksemplar Buku 
                                    </a>
                                    <a class="nav-link collapsed" href="{{route('stokopname')}}">
                                        Stok Opname
                                    </a>
                                    <a class="nav-link collapsed" href="{{route('bukustok')}}">
                                        Buku terpindai stok 
                                    </a>
                                    <a class="nav-link collapsed" href="{{route('kunjunganperpustakaan')}}">
                                        Kunjungan perpustakaan
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
</div>