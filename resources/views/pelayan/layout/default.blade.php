<!DOCTYPE html>
<html class="no-js" lang="en">
{{-- @include('pelayan.layout.head') --}}

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pelayan - index</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">

    @yield('page-styles')
</head>


<body>
    {{-- <div id="pre-loader">
        <img src="{{ asset ('assets/user/images/loader.gif')}}" alt="Loading..." />
    </div> --}}
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            {{-- <div class="main-sidebar"> --}}
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Pelayan</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                            {{-- <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                          </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Tampebako</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">#</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="@yield('waiter')"><a class="nav-link" href="/waiter"><i class="fas fa-fw fa-folder"></i> <span>Orderan</span></a></li>
                        <li class="@yield('laporanwaiter')"><a class="nav-link" href="/waiter_laporan"><i class="fas fa-fw fa-folder"></i> <span>Laporan</span></a></li>
                    </ul>
                </aside>
            </div>
            {{-- </div> --}}
            {{-- sidebar --}}
            {{-- @include('pelayan.layout.sidebar') --}}
            {{-- end sidebar --}}

            {{-- <div class="page-wrapper"> --}}
            <!-- navbar -->
            {{-- @include('pelayan.layout.navbar') --}}
            <!-- End navbar -->

            <!-- Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                            <div class="breadcrumb-item"><a href="#">@yield('title2')</a></div>
                        </div>
                    </div>

                    {{-- @yield('konten') --}}
                    @yield('content')
                </section>
            </div>
            <!-- End content -->

            <!--Footer-->
            @include('pelayan.layout.footer')
            <!--End Footer-->
            {{-- </div> --}}

            <!--Scoll Top-->
            {{-- <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span> --}}
            <!--End Scoll Top-->

            @include('pelayan.layout.script')
        </div>
    </div>
</body>


</html>