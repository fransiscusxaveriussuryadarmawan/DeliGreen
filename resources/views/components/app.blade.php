<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliGreen - {{ $title ?? 'Dashboard' }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="64x64">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
            width: 100%;
        }

        .main-content {
            padding-top: 0;
        }

        .footer {
            background-color: #2c3e50 !important;
        }

        .footer a:hover {
            color: #3498db !important;
            text-decoration: underline !important;
        }

        .social-icons a {
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            transform: translateY(-3px);
            color: #3498db !important;
        }

        .text-primary {
            color: #3498db !important;
        }

        .container,
        .container-fluid {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .hero-section {
            background: linear-gradient(135deg, #3498db, #2c3e50);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('components.navbar')

    <main class="container-fluid">
        <main class="flex-fill">
            @yield('content')
        </main>
    </main>

    @include('components.footer')

    @stack('modals')
    @stack('scripts')
</body>
</html>