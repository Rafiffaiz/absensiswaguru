<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Siswa</title>
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
            transition: all 0.3s ease;
        }
        .btn-orange:hover {
            background-color: #e65c00;
            color: white;
        }
        .btn-back {
            background-color: #ffd9b3;
            color: #ff6600;
            border: 2px solid #ff6600;
            border-radius: 10px;
            margin-top: 15px;
            width: 100%;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #ff6600;
            color: #fff;
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
        <h2>Register Siswa</h2>

        {{-- Tampilkan pesan sukses / error --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/siswa/register') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan nama siswa" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-control" name="jurusan" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="RPL">RPL</option>
                    <option value="MP">MP</option>
                    <option value="TKJ">TKJ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-control" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-orange w-100">Daftar</button>
        </form>

        {{-- Tombol Kembali ke halaman utama --}}
        <a href="/" class="btn btn-back">
            ← Kembali ke Halaman Utama
        </a>

        <div class="mt-3 text-center">
            <a href="/siswa/login" class="text-decoration-none">Sudah punya akun? Login</a>
        </div>
    </div>

</body>
</html>
