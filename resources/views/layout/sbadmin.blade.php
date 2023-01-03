<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>e-Apotek</title>
    <link href="{{ asset ('sbadmin/css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    @yield('style')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><i class="fas fa-user fa-trophy"></i> e-Apotek</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                    @if(Auth::user()){{Auth::user()->fullname}}@else Login/Register @endif</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    @if (Auth::user())
                    @can('checkmember')
                    <a href="{{ route('user.membership') }}" class="dropdown-item">Membership</a>
                    @endcan
                    @can('supplier-permission')
                    <a href="{{ route('index.suppliers') }}" class="dropdown-item">Supplier Home</a>
                    @endcan
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="/login" class="dropdown-item">Log In</a>
                    <a href="/register" class="dropdown-item">Register</a>
                    @endif
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{url('/')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        @can('supplier-permission')
                        <a class="nav-link" href="{{route('category.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Kategori
                        </a>
                        @endcan
                        @can('admin-permission')
                        <a class="nav-link" href="{{route('supplier.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Daftar Supplier
                        </a>
                        <a class="nav-link" href="{{route('adminproduct.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Daftar Obat
                        </a>
                        @endcan

                        <div class="sb-sidenav-menu-heading">Addons</div>
                        @can('checkmember')
                        <a class="nav-link" href="{{url('cart')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Keranjang
                        </a>
                        @endcan
                        @can('admin-permission')
                        <a class="nav-link" href="{{route('rekapPembelian')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Rekapitulasi Pembelian
                        </a>
                        <a class="nav-link" href="{{route('rekapPoin')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Rekapitulasi Poin
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: @if(Auth::user()){{Auth::user()->role->nama}}@endif</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; e-Apotek 2023</div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    @yield('script')
    @yield('ajax')
    <script>
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset ('sbadmin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset ('sbadmin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset ('sbadmin/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset ('sbadmin/assets/demo/datatables-demo.js')}}"></script>
</body>

</html>
