<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #007bff;
            color: white;
            padding: 20px;
            position: fixed;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            overflow-y: auto;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="fw-bold">Hai-App</h2>
        <ul class="list-group list-unstyled">
            <li class="mb-2">
                <a href="{{ url('/dashboard') }}" class="text-white text-decoration-none d-block py-2 px-3 rounded bg-primary">🏠 Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{ url('/signature') }}" class="text-white text-decoration-none d-block py-2 px-3 rounded bg-primary">🔑 QR Code</a>
            </li>
            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">🚪 Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
