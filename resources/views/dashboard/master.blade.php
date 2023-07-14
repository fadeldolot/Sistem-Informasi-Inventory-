<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Produk Tersedia</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets2') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets2') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets2') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color:#e44c46 ">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3"><img src="/assets/images/logo2.png" width="120"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item"><a>
                            Welcome Back,{{ auth()->user()->name }}
                        </a></li>
                    <li class="dropdown-item">Role : {{ auth()->user()->role }}</li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" style="background-color: #e44c46" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        @if (auth()->user()->role == 'admin')
                            <a class="nav-link" href="/home" style="color: rgb(240, 234, 234)">
                                <div class="sb-nav-link-icon"><i class="bi bi-house-fill"></i></div>
                                Home
                            </a>
                        @endif


                        @if (auth()->user()->role == 'user')
                            <a class="nav-link" href="/dashboard" style="color: rgb(240, 234, 234)">
                                <div class="sb-nav-link-icon"><i class="bi bi-house-fill"></i></div>
                                Home
                            </a>
                        @endif

                        @if (auth()->user()->role == 'user')
                            <a class="nav-link" href="/daftarharga" style="color: rgb(240, 234, 234)">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                                Daftar Harga Produk
                            </a>
                        @endif

                        @if (auth()->user()->role == 'user')
                            <a class="nav-link" href="/daftarproduk" style="color: rgb(240, 234, 234)">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Daftar Produk Tersedia
                            </a>
                        @endif

                        @if (auth()->user()->role == 'admin')
                            <a class="nav-link collapsed" style="color:rgb(240, 234, 234) " data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="bi bi-stack"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>
                        @endif

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                @if (auth()->user()->role == 'admin')
                                    <a class="nav-link" style="color:rgb(240, 234, 234) " href="/produk">Produk</a>
                                @endif

                                @if (auth()->user()->role == 'admin')
                                    <a class="nav-link" style="color: rgb(240, 234, 234)" href="/distributor">Data
                                        Distributor</a>
                                @endif
                                @if (auth()->user()->role == 'admin')
                                    <a class="nav-link" style="color: rgb(240, 234, 234)"
                                        href="/data_penjualan">Penjualan Produk</a>
                                @endif
                            </nav>
                        </div>

                        @if (auth()->user()->role == 'admin')
                            <a class="nav-link collapsed" style="color:rgb(240, 234, 234)" data-bs-toggle="collapse"
                                data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        @endif

                        @if (auth()->user()->role == 'admin')
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" style="color: rgb(240, 234, 234)"
                                        href="/data_penjualan/printpdf">
                                        Cetak Laporan Penjualan
                                    </a>
                                    <a class="nav-link collapsed" style="color: rgb(240, 234, 234)"
                                        href="/produk/printpdf">
                                        Cetak Laporan Produk
                                    </a>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <!-- main -->


            @yield('content')

            <!-- end Main -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin') }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('admin') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin') }}/js/datatables-simple-demo.js"></script>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets2') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets2') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets2') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets2') }}/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('assets2') }}/dist/js/demo.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('assets2') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('assets2') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets2') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('assets2') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets2') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{ asset('assets2') }}/dist/js/pages/dashboard2.js"></script>
    @yield('footer')
</body>

</html>
