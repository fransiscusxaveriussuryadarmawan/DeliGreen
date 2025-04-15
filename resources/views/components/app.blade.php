<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliGreen - {{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Hapus margin default */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Navbar sticky */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
            /* Pastikan navbar di atas elemen lain */
            width: 100%;
        }

        /* Konten utama */
        .main-content {
            padding-top: 0;
            /* Hapus padding atas */
        }

        /* Footer */
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
    </style>
</head>

<body>
    @include('components.navbar')

    <main class="container-fluid">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>