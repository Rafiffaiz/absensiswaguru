<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        h3 {
            font-weight: bold;
            color: #ff6600;
        }
        .btn-orange {
            background-color: #ff6600;
            border: none;
        }
        .btn-orange:hover {
            background-color: #e65500;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4">Login Guru</h3>

                    {{-- alert sukses & error --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('guru.login.submit') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
    </div>

    <button type="submit" class="btn btn-orange w-100">Login</button>
</form>


                    <p class="text-center mt-3">
                        Belum punya akun? <a href="{{ route('guru.register') }}">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
