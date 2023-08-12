<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <nav class="nav-collapse nav-collapse-0 closed" style="transition: max-height 284ms ease 0s;
position: relative;" aria-hidden="true">
        <ul>
            <li class="menu-item"><a class="nav-link scroll-to" href="#orders-table" data-scroll>Start</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#about-us" data-scroll>O Nas</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#info" data-scroll>Info</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#reviews" data-scroll>Reviews</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#contacts" data-scroll>Kontakt</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#titles" data-scroll>Section Titles</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#services" data-scroll>Services</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#titles" data-scroll>Section Titles</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#text-content" data-scroll>Text Content</a></li>
            <li class="menu-item"><a class="nav-link scroll-to" href="#calendar" data-scroll>Calendar</a></li>
        </ul>
    </nav>
    <!-- Sidebar Menu -->
    {{--    <nav class="mt-2">--}}
    {{--        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"--}}
    {{--            data-accordion="false">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a href="{{ route('home') }}" class="nav-link">--}}
    {{--                    <i class="nav-icon fas fa-th"></i>--}}
    {{--                    <p>--}}
    {{--                        {{ __('Dashboard') }}--}}
    {{--                    </p>--}}
    {{--                </a>--}}
    {{--            </li>--}}

    {{--            <li class="nav-item">--}}
    {{--                <a href="{{ route('users.index') }}" class="nav-link">--}}
    {{--                    <i class="nav-icon fas fa-users"></i>--}}
    {{--                    <p>--}}
    {{--                        {{ __('Users') }}--}}
    {{--                    </p>--}}
    {{--                </a>--}}
    {{--            </li>--}}

    {{--            <li class="nav-item">--}}
    {{--                <a href="{{ route('about') }}" class="nav-link">--}}
    {{--                    <i class="nav-icon far fa-address-card"></i>--}}
    {{--                    <p>--}}
    {{--                        {{ __('About us') }}--}}
    {{--                    </p>--}}
    {{--                </a>--}}
    {{--            </li>--}}

    {{--            <li class="nav-item">--}}
    {{--                <a href="#" class="nav-link">--}}
    {{--                    <i class="nav-icon fas fa-circle nav-icon"></i>--}}
    {{--                    <p>--}}
    {{--                        Two-level menu--}}
    {{--                        <i class="fas fa-angle-left right"></i>--}}
    {{--                    </p>--}}
    {{--                </a>--}}
    {{--                <ul class="nav nav-treeview" style="display: none;">--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a href="#" class="nav-link">--}}
    {{--                            <i class="far fa-circle nav-icon"></i>--}}
    {{--                            <p>Child menu</p>--}}
    {{--                        </a>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--    </nav>--}}
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
