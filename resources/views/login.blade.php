<!DOCTYPE html>
<html>
<head>
    <title>Login Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            background-size: 400% 400%;
            animation: gradientBG 8s ease infinite;
            font-family: 'Segoe UI', sans-serif;
        }
        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            animation: fadeIn 0.8s ease-in-out;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(255,94,98,0.6);
        }
        .card h3 {
            color: #ff5e62;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-orange {
            background: linear-gradient(45deg, #ff9966, #ff5e62);
            border: none;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-orange::after {
            content: "";
            position: absolute;
            width: 0;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255,255,255,0.3);
            transition: width 0.3s ease;
        }
        .btn-orange:hover::after {
            width: 100%;
        }
        .input-group-text {
            background-color: #ff9966;
            border: 2px solid #ff9966;
            color: white;
            font-weight: bold;
        }
        .form-control {
            border-radius: 0 8px 8px 0;
            border: 2px solid #ff9966;
        }
        .form-control:focus {
            border-color: #ff5e62;
            box-shadow: 0 0 6px rgba(255,94,98,0.6);
        }
        a {
            color: #ff5e62;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4" style="width: 400px;">
        <div class="text-center mb-3">
            <i class="bi bi-person-circle" style="font-size: 65px; color:#ff5e62;"></i>
        </div>
        <h3 class="text-center mb-4">LOGIN SISWA</h3>

        {{-- Alert error --}}
        @if(session('error'))
            <div class="alert alert-danger rounded-3">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        {{-- Form login --}}
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-orange w-100 mt-2">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

        <p class="mt-3 text-center text-dark">
            Belum punya akun? 
            <a href="/register"><i class="bi bi-person-plus"></i> Register</a>
        </p>
