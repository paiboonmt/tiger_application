<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('images/logo/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tiger Application</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Search</p>
                    </a>
                </li>


                @if (Auth::user()->role == 'admin')

                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}"
                            class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

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
                            <i class="right fas fa-angle-left"></i>
                            Customers
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}"
                                class="nav-link {{ request()->routeIs(['customers.index', 'customers.profile_active','customers.create']) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <span class="badge badge-success">Active</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.expired') }}"
                                class="nav-link {{ request()->routeIs(['customers.expired','customers.profile_expired']) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <span class="badge badge-danger">
                                    Expired
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('sponsers*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('sponsers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Free Training
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
                    <!-- สัญชาติ -->
                    <li class="nav-item">
                        <a href="{{ route('nationality.index') }}"
                            class="nav-link {{ request()->is('nationality*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>สัญชาติ</p>
                        </a>
                    </li>
                    <!-- product -->
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}"
                            class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-store-alt"></i>
                            <p>สินค้า</p>
                        </a>
                    </li>
                    <!-- payment -->
                    <li class="nav-item">
                        <a href="{{ route('payment.index') }}"
                            class="nav-link {{ request()->is('payment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>ชำระเงิน</p>
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
                                <p>Logout</p>
                            </x-responsive-nav-link>
                        </form>
                    </li>

                @yield('sidebar')
            </ul>
        </nav>
    </div>
</aside>