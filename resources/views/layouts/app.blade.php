<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf=token" content="{{ csrf_token() }}">
    <title>TANSAM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <!-- Hamburger for mobile -->
    <nav class="navbar navbar-light bg-dark d-lg-none">
        <div class="container-fluid">
            <button class="btn btn-dark rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                <i class="bi bi-list" style="font-size: 2rem;"></i>
            </button>
            <span class="navbar-brand mb-0 h1 text-white">TANSAM CMS</span>
        </div>
    </nav>
    <div class="d-flex min-vh-100">
        @include('layouts.navs')
        <main class="flex-grow-1 p-3" id="main-content">
            @yield('content')
        </main>
    </div>
    <style>
        @media (min-width: 992px) {
            #main-content {
                margin-left: 280px;
                max-width: calc(100vw - 280px);
            }
        }
        @media (max-width: 991.98px) {
            #main-content {
                margin-left: 30px;
                max-width: 100vw;
            }
        }
        body {
            background: #f8f9fa !important;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
    </style>
    @yield('styles')
    @yield('scripts')
</body>
</html>