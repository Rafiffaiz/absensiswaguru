<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fff0e6, #ffe6cc, #ffd9b3);
            min-height: 100vh;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #ff9966, #ff6600, #ff8533);
            box-shadow: 0 4px 12px rgba(255, 102, 0, 0.4);
        }
        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff !important;
        }
        .navbar-brand i {
            margin-right: 6px;
        }
        .navbar-text {
            color: #fff;
            font-weight: 500;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-clipboard-check"></i> Absen Siswa
            </a>

            {{-- Nama siswa login --}}
            @if(session('siswa'))
                <span class="navbar-text">
                    <i class="bi bi-person-circle me-1"></i> {{ session('siswa')->username }}
                </span>
            @endif
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
