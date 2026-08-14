<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AdminLTE 3')</title>
    <!-- Vite CSS -->
    @vite(['resources/css/app.css'])
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        body {
            font-family: "Source Sans Pro", "Sarabun", sans-serif;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="@yield('link')" class="nav-link">@yield('head', 'Home')</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-user-alt"></i>
                        {{ Auth::user()->name }}
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/dashboard') }}" class="brand-link">
                <img src="{{ asset('images/logo/logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Tiger Application</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>แดชบอร์ด</p>
                            </a>
                        </li>
                        
                        @if (Auth::user()->role == 'admin')

                            <li class="nav-item">
                                <a href="{{ route('checkin.index') }}" class="nav-link {{ request()->routeIs('checkin.*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>เช็คอินเข้าใช้บริการ</p>
                                </a>
                            </li>

                            <li class="nav-item {{ request()->is('users*', 'roles*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->is('users*', 'roles*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        ผู้ใช้งาน
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}"
                                            class="nav-link {{ request()->routeIs('users.index', 'users.create', 'users.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ตั้งค่าผู้ใช้งาน</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}"
                                            class="nav-link {{ request()->routeIs('roles.index', 'roles.create', 'roles.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ตั้งค่าบทบาท</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endif

                        <li class="nav-item {{ request()->is('customers*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Customers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customers.index') }}"
                                        class="nav-link {{ request()->routeIs(['customers.index', 'customers.profile_active']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Member   
                                            <span class="badge badge-success">
                                                Active
                                            </span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('customers.expired') }}"
                                        class="nav-link {{ request()->routeIs(['customers.expired','customers.profile_expired']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Member
                                            <span class="badge badge-danger">
                                                Expired
                                            </span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('sponsers*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('sponsers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Sponser Fighter
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sponsers.index') }}"
                                        class="nav-link {{ request()->routeIs(['sponsers.index','sponsers.profile_active']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Active</p>
                                        <span class="badge badge-success">Active</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sponsers.expired') }}"
                                        class="nav-link {{ request()->routeIs(['sponsers.expired','sponsers.profile_expired']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Expried</p>
                                        <span class="badge badge-danger">Expied</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item {{ request()->is('report*') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        รายงาน
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('report.checkin') }}"
                                            class="nav-link {{ request()->routeIs(['report.checkin', 'report.checkin.search']) ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>รายงานเข้าใช้บริการ</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('report.customerTotal') }}"
                                            class="nav-link {{ request()->routeIs('report.customerTotal') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>รายงานจำนวนลูกค้า</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nationality.index') }}"
                                    class="nav-link {{ request()->is('nationality*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p>
                                        สัญชาติ
                                    </p>
                                </a>
                            </li>
                            <!-- product -->
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}"
                                    class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-store-alt"></i>
                                    <p>
                                        สินค้า
                                    </p>
                                </a>
                            </li>
                            <!-- payment -->
                            <li class="nav-item">
                                <a href="{{ route('payment.index') }}"
                                    class="nav-link {{ request()->is('payment*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        ชำระเงิน
                                    </p>
                                </a>
                            </li>
                        @endif

                        <!-- logout -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')" class="nav-link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>ลงชื่อออก</p>
                                </x-responsive-nav-link>
                            </form>
                        </li>

                        @yield('sidebar')
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content p-2">
                <div class="container-fluid">
                    <!-- @if (session('success')) -->
                    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> -->
                    <!-- <script> -->
                    // Swal.fire({
                    // title: "Good job!",
                    // text: "You clicked the button!",
                    // icon: "success"
                    // });
                    // Swal.fire({
                    // title: "The Internet?",
                    // text: "That thing is still around?",
                    // icon: "question"
                    // });

                    // </script>
                    <!-- @endif -->

                    <!-- @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif -->

                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2026 <a href="#">Tiger Application</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer> -->
    </div>

    <!-- Vite JS -->
    @vite(['resources/js/app.js'])
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>