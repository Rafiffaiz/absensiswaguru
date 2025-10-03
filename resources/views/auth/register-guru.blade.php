<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Guru</title>
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
        <h2>Register Guru</h2>

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

        <form method="POST" action="{{ url('/guru/register') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama guru" required>
            </div>
            <div class="mb-3">
                <label for="mapel" class="form-label">Mata Pelajaran</label>
                <select class="form-control" name="mapel" required>
                    <option value="">-- Pilih Mapel --</option>
                    <option value="MTK">Matematika</option>
                    <option value="B.Indonesia">Bahasa Indonesia</option>
                    <option value="B.Arab">Bahasa Arab</option>
                    <option value="B.Inggris">Bahasa Inggris</option>
                    <option value="Pemrograman Perangkat Bergerak">Pemrograman Perangkat Bergerak</option>
                    <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                    <option value="Dasar-dasar Jaringan Komputer">Dasar-dasar Jaringan Komputer</option>
                    <option value="Simulasi Jaringan & Administrasi Jaringan (CPT+Mikrotik)">Simulasi Jaringan & Administrasi Jaringan (CPT+Mikrotik)</option>
                    <option value="Sertifikasi MTCNA dan Teknologi Jaringan">Sertifikasi MTCNA dan Teknologi Jaringan</option>
                    <option value="Dasar-dasar MPLB">Dasar-dasar MPLB</option>
                    <option value="Ms. Office">Ms. Office</option>
                    <option value="Kearsipan">Kearsipan</option>
                    <option value="Kas Kecil">Kas Kecil</option>
                    <option value="Humas">Humas</option>
                    <option value="Dasar-dasar Komputer">Dasar-dasar Komputer</option>
                    <option value="Cloud Computing berbasis AWS">Cloud Computing berbasis AWS</option>
                    <option value="CISCO CCNP">CISCO CCNP</option>
                    <option value="Seni">Seni</option>
                    <option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
                    <option value="Administrasi Umum">Administrasi Umum</option>
                    <option value="Komunikasi">Komunikasi</option>
                    <option value="Sarpras">Sarpras</option>
                    <option value="SDM">SDM</option>
                    <option value="Kepegawaian">Kepegawaian</option>
                    <option value="PAI">PAI</option>
                    <option value="Dasar-dasar AKL">Dasar-dasar AKL</option>
                    <option value="Akuntansi perusahaan jasa, dagang dan manufaktur">Akuntansi perusahaan jasa, dagang dan manufaktur </option>
                    <option value="Akuntansi Keuangan">Akuntansi Keuangan</option>
                    <option value="Pemrograman Javascript">Pemrograman Javascript</option>
                    <option value="Pemrograman Web dasar">Pemrograman Web dasar</option>
                    <option value="Basis Data">Basis Data</option>
                    <option value="Kreatifitas, Inovasi, dan Kewirausahaan">Kreatifitas, Inovasi, dan Kewirausahaan</option>
                    <option value="PKK">PKK</option>
                    <option value="Informatika">Informatika</option>
                    <option value="BK">BK</option>
                    <option value="PKN">PKN</option>    
                    <option value="PKOK">PJOK</option>    
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
            <a href="/guru/login" class="text-decoration-none">Sudah punya akun? Login</a>
        </div>
    </div>

</body>
</html>
