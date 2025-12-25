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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css" />

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
                    <a href="@yield('link')" class="nav-link">@yield('head','Home')</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{__('สวัสดี')}},
                        |
                        <!-- <i class="far fa-user"></i> -->
                        {{ Auth::user()->name ?? 'User Name' }}
                        <i class="fas fa-caret-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item  disabled">
                            <i class="fas fa-user mr-2"></i> ข้อมูลส่วนตัว
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                <!-- {{ __('Log Out') }} -->
                                ลงชื่อออก
                            </x-responsive-nav-link>
                        </form>

                    </div>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/dashboard') }}" class="brand-link">
                <img src="{{ asset('images/logo/logo.png') }}"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Tiger Application</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if ( Auth::user()->role == 'admin' )
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>แดชบอร์ด</p>
                            </a>
                        </li>
                        @endif
                        <!-- Menu with Submenu -->

                        @if ( Auth::user()->role == 'admin' )
                        <li class="nav-item {{ request()->is('users*') ? 'menu-open' : 'menu-open' }}">
                            <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    ผู้ใช้งาน
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตั้งค่าผู้ใช้งาน</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        @endif

                        <li class="nav-item {{ request()->is('customers*') ? 'menu-open' : 'menu-open' }}">
                            <a href="#" class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    สมาชิกกลุ่ม ลูกค้า
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs(['customers.index']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>รายชื่อลูกค้า
                                            <span class="badge badge-success">
                                                Active
                                            </span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('customers.expired') }}" class="nav-link {{ request()->routeIs('customers.expired') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            รายชื่อลูกค้า
                                            <span class="badge badge-danger">
                                                Expired
                                            </span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('sponsers*') ? 'menu-open' : 'menu-open' }}">
                            <a href="#" class="nav-link {{ request()->is('sponsers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    สมาชิกกลุ่ม พิเศษ
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sponsers.index') }}" class="nav-link {{ request()->routeIs('sponsers.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>รายชื่อกลุ่มที่</p>
                                        <span class="badge badge-success">Active</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sponsers.expired') }}" class="nav-link {{ request()->routeIs('sponsers.expired') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>รายชื่อกลุ่มที่</p>
                                        <span class="badge badge-danger">Expied</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('report*') ? 'menu-open' : 'menu-open' }}">
                            <a href="#" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    รายงาน
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('report.checkin') }}" class="nav-link {{ request()->routeIs(['report.checkin','report.checkin.search']) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>รายงานเข้าใช้บริการ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.customerTotal') }}" class="nav-link {{ request()->routeIs('report.customerTotal') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>รายงานจำนวนลูกค้า</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Reports -->
                        <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Reports</p>
                        </a>
                    </li> -->

                        <!-- Settings -->
                        <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Settings</p>
                        </a>
                    </li> -->

                        @yield('sidebar')
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <!-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="#">Your Company</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Vite JS -->
    @vite(['resources/js/app.js'])

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- fancyapps -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    @stack('scripts')
</body>

</html>