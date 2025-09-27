<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />
    <title>Quản Lý Xe Máy</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style id="theme-style">
        :root {
            --bg-main: #181a20;
            --bg-sidebar: #23262f;
            --text-main: #eaeaea;
            --sidebar-active: linear-gradient(90deg, #2563eb 60%, #60a5fa 100%);
            --sidebar-header: #a3a3a3;
            --card-bg: #23262f;
            --table-bg: #23262f;
            --table-border: #23262f;
            --btn-primary: #2563eb;
            --btn-success: #059669;
            --btn-warning: #f59e42;
            --btn-danger: #ef4444;
            --footer-bg: #23262f;
            --brand: #fff;
        }

        body {
            background: var(--bg-main) !important;
            color: var(--text-main) !important;
        }

        .wrapper,
        .main,
        .content,
        .container-fluid,
        .sidebar,
        .sidebar-content,
        .sidebar-nav,
        .navbar,
        .footer {
            background: var(--bg-main) !important;
            color: var(--text-main) !important;
        }

        .sidebar {
            background: var(--bg-sidebar) !important;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            min-height: 100vh;
            box-shadow: 2px 0 12px #0003;
        }

        .sidebar-header {
            color: var(--sidebar-header) !important;
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 1.1rem;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
        }

        .sidebar-brand {
            color: var(--brand) !important;
            font-weight: bold;
            font-size: 1.3rem;
            padding: 1.5rem 1.5rem 1rem 1.5rem;
            display: block;
            letter-spacing: 1px;
        }

        .sidebar-nav {
            padding-left: 0;
            margin-bottom: 2rem;
        }

        .sidebar-item {
            margin-bottom: 0.2rem;
            border-radius: 0.7rem;
            transition: background 0.2s;
        }

        .sidebar-link {
            color: var(--text-main) !important;
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.7rem;
            font-weight: 500;
            font-size: 1rem;
            transition: background 0.2s, color 0.2s;
        }

        .sidebar-link i {
            color: var(--brand) !important;
            margin-right: 0.7rem;
            font-size: 1.2rem;
            opacity: 0.85;
        }

        .sidebar-link.active,
        .sidebar-link:hover {
            background: var(--sidebar-active) !important;
            color: #fff !important;
            font-weight: bold;
            box-shadow: 0 2px 8px #2563eb33;
        }

        .sidebar-link.active i,
        .sidebar-link:hover i {
            color: #fff !important;
            opacity: 1;
        }

        .sidebar-item .sidebar-link span {
            margin-left: 0.2rem;
        }

        .navbar,
        .navbar-bg {
            background: var(--bg-sidebar) !important;
            color: var(--text-main) !important;
        }

        .card,
        .table {
            background: var(--card-bg) !important;
            color: var(--text-main) !important;
        }

        .table th,
        .table td {
            color: var(--text-main) !important;
            border-color: var(--table-border) !important;
        }

        .btn-primary,
        .btn-success,
        .btn-warning,
        .btn-danger {
            color: #fff !important;
            border: none;
        }

        .btn-primary {
            background: var(--btn-primary) !important;
        }

        .btn-success {
            background: var(--btn-success) !important;
        }

        .btn-warning {
            background: var(--btn-warning) !important;
        }

        .btn-danger {
            background: var(--btn-danger) !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .fw-bold {
            color: #fff !important;
        }

        .footer {
            background: var(--footer-bg) !important;
            color: var(--text-main) !important;
        }

        .theme-toggle-btn {
            position: fixed;
            top: 18px;
            right: 32px;
            z-index: 2000;
            background: transparent;
            border: none;
            color: var(--text-main);
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.2s;
        }

        .theme-toggle-btn:hover {
            color: #2563eb;
        }
    </style>
</head>

<body>
    <button class="theme-toggle-btn" id="theme-toggle" title="Đổi giao diện"
        style="position:fixed;top:18px;right:32px;z-index:2000;">
        <i class="bi bi-moon-fill" id="theme-toggle-icon"></i>
    </button>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
                    <span class="align-middle">Quản Lý Xe Máy</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Menu</li>
                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.brands.index') }}">
                            <i class="align-middle" data-feather="tag"></i>
                            <span class="align-middle">Thương hiệu</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                            <i class="align-middle" data-feather="layers"></i>
                            <span class="align-middle">Danh mục</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.products.index') }}">
                            <i class="align-middle" data-feather="box"></i>
                            <span class="align-middle">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.customers.index') }}">
                            <i class="align-middle" data-feather="users"></i>
                            <span class="align-middle">Khách hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.orders.index') }}">
                            <i class="align-middle" data-feather="shopping-cart"></i>
                            <span class="align-middle">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.orderitems.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.orderitems.index') }}">
                            <i class="align-middle" data-feather="list"></i>
                            <span class="align-middle">Sản phẩm trong đơn hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Người dùng</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle"></a>
                <i class="hamburger align-self-center"></i>
                </a>
            </nav>
            <!-- Content -->
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-center">
                            <p class="mb-0">
                                <strong>Quản lý xe máy © 2025</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    @stack('scripts')
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="AdminKit Laravel">
    <meta name="author" content="AdminKit">
    <title>AdminKit - Laravel</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/icons/icon-48x48.png') }}" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @stack('styles')
</head>

/* Đã chuyển sang dùng CSS của AdminKit, không cần custom style ở đây */
<li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
        <i class="align-middle" data-feather="sliders"></i>
        <span class="align-middle">Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.brands.index') }}">
        <i class="align-middle" data-feather="tag"></i>
        <span class="align-middle">Thương hiệu</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
        <i class="align-middle" data-feather="layers"></i>
        <span class="align-middle">Danh mục</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.products.index') }}">
        <i class="align-middle" data-feather="box"></i>
        <span class="align-middle">Sản phẩm</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.customers.index') }}">
        <i class="align-middle" data-feather="users"></i>
        <span class="align-middle">Khách hàng</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.orders.index') }}">
        <i class="align-middle" data-feather="shopping-cart"></i>
        <span class="align-middle">Đơn hàng</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('admin.orderitems.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.orderitems.index') }}">
        <i class="align-middle" data-feather="list"></i>
        <span class="align-middle">Sản phẩm trong đơn hàng</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('admin.users.index') }}">
        <i class="align-middle" data-feather="user"></i>
        <span class="align-middle">Người dùng</span>
    </a>
</li>
{{-- Thêm các mục menu khác tại đây --}}
</ul>
</div>
</nav>

<!-- Main -->
<div class="main">
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle"></a>
        <i class="hamburger align-self-center"></i>
        </a>
    </nav>

    <!-- Content -->
    <main class="content">
        <div class="container-fluid p-0">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-12 text-center">
                    <p class="mb-0">
                        <strong>Quản lý xe máy © 2025</strong>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/theme-toggle.js') }}"></script>
@stack('scripts')
</body>

</html>
