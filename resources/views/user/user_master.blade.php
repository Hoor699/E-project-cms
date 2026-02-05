<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Portal | ServiceFlow</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css">

    <style>
        .app-sidebar { background-color: #1a222b !important; }
        .app-main { background-color: #0f172a !important; min-height: 100vh; padding-top: 20px; color: white; }
        .sidebar-menu .nav-link.active { background-color: #0d6efd !important; color: #fff !important; }
        .brand-link { border-bottom: 1px solid rgba(255,255,255,0.1); text-decoration: none; }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        
        <nav class="app-header navbar navbar-expand bg-body shadow-sm">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="{{ route('user.logout') }}">
                            <i class="bi bi-box-arrow-right text-danger"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <aside class="app-sidebar shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="#" class="brand-link">
                    <span class="brand-text fw-light text-info"><b>User</b>Portal</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-3">
                    <ul class="nav sidebar-menu flex-column" role="menu">
                        
                        <li class="nav-header text-uppercase small opacity-50 px-3">Main Menu</li>

                        <li class="nav-item">
                            <a href="{{ url('/user/customers') }}" class="nav-link {{ Request::is('user/customers') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-people-fill text-primary"></i>
                                <p>Customer List</p>
                            </a>
                        </li>

                        <li class="nav-item px-3 mt-2 no-print">
    <form action="{{ route('user.status') }}" method="POST">
        @csrf
        <div class="input-group input-group-sm">
            <input type="text" name="tracking_no" 
                   class="form-control bg-dark text-white border-secondary" 
                   placeholder="Enter Tracking ID" required>
            <button class="btn btn-success" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <small class="text-muted" style="font-size: 10px;">Track your shipment instantly</small>
    </form>
</li>

                    </ul>
                </nav>
            </div>
        </aside>

        <main class="app-main">
            <div class="container-fluid">
                @yield('main')
            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js"></script>
</body>
</html>