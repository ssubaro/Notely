<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notely</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0,0,0,0.125);
        }
        .note-classification {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
        }
        .classification-Personal {
            background-color: #d4edda;
            color: #155724;
        }
        .classification-Trabajo {
            background-color: #cce5ff;
            color: #004085;
        }
        .classification-Estudio {
            background-color: #fff3cd;
            color: #856404;
        }
        .classification-Otros {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <a href="{{ route('notes.index') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-sticky-note me-2"></i>Notely
                    </a>
                </h1>
                <a href="{{ route('notes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Nueva Nota
                </a>
            </div>
        </header>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')

        <footer class="mt-5 text-center text-muted">
            <p>&copy; {{ date('Y') }} Notely - Desarrollado con Laravel</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>