<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliGreen - {{ $title ?? 'Healthy Food Ordering' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-bg: #f8f9fa;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .food-card {
            transition: transform 0.2s;
        }

        .food-card:hover {
            transform: translateY(-5px);
        }

        footer a {
            transition: opacity 0.3s;
        }

        footer a:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <main class="container mt-4">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>