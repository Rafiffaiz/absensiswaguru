    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(135deg, #ff6600, #ff9966);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Arial, sans-serif;
            }
            .card {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
                background: #fff;
                width: 400px;
            }
            .btn-orange {
                background-color: #ff6600;
                color: white;
            }
            .btn-orange:hover {
                background-color: #e65c00;
                color: white;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                color: #ff6600;
            }
        </style>
    </head>
    <body>

        <div class="card">
            <h2>Login Siswa</h2>

            {{-- alert sukses & error --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ url('/siswa/login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-orange w-100">Login</button>
            </form>

            <p class="text-center mt-3">
                Belum punya akun? <a href="{{ url('/siswa/register') }}">Daftar di sini</a>
            </p>
        </div>

    </body>
    </html>
