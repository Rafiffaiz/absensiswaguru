@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden animate-fadein">
        {{-- Header dengan gradient --}}
        <div class="card-header text-white text-center py-4" 
             style="background: linear-gradient(135deg, #ff9966, #ff6600, #ff8533);">
            <h2 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">
                <i class="bi bi-clipboard-check"></i> Absen Siswa
            </h2>
        </div>

        <div class="card-body p-4" style="background: linear-gradient(135deg, #fff5f0, #ffe6cc);">
            {{-- Info siswa login --}}
            @if(session('siswa'))
                <div class="alert border-0 rounded-4 shadow-sm animate-slideup" 
                     style="background: linear-gradient(135deg, #ffe6cc, #ffd1b3); color:#663300;">
                    <p class="mb-1"><strong>👤 Nama:</strong> {{ session('siswa')->username }}</p>
                    <p class="mb-1"><strong>📘 Jurusan:</strong> {{ session('siswa')->jurusan }}</p>
                    <p class="mb-0"><strong>🏫 Kelas:</strong> {{ session('siswa')->kelas }}</p>
                </div>
            @endif

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mt-3 animate-slideup">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Form Absen --}}
            <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 animate-fadein">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold text-orange">📸 Upload Foto Absen</label>
                    <input type="file" name="foto" class="form-control border-orange rounded-3" required>
                </div>
                <button type="submit" class="btn btn-orange w-100 py-2 fw-bold shadow-sm">
                    <i class="bi bi-check2-circle"></i> Absen Sekarang
                </button>
            </form>

            {{-- Tombol Izin --}}
            <a href='/izin/dashboard' class="btn btn-outline-orange w-100 mt-3 py-2 fw-bold shadow-sm animate-fadein">
                <i class="bi bi-journal-x"></i> Ajukan Izin & Rekap Izin
            </a>

            {{-- Link Rekap --}}
            <div class="mt-4 text-center animate-slideup">
                <h5 class="fw-bold text-orange mb-3"><i class="bi bi-journal-text"></i> Lihat Rekap Absen</h5>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('rekap.kelas', 'X') }}" class="btn btn-outline-orange btn-sm rounded-pill shadow-sm">Kelas X</a>
                    <a href="{{ route('rekap.kelas', 'XI') }}" class="btn btn-outline-orange btn-sm rounded-pill shadow-sm">Kelas XI</a>
                    <a href="{{ route('rekap.kelas', 'XII') }}" class="btn btn-outline-orange btn-sm rounded-pill shadow-sm">Kelas XII</a>
                   
                </div>
            </div>

            {{-- Tombol Logout --}}
            <form action='/' method="GET" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-outline-dark w-100 py-2 fw-bold shadow-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Custom Style --}}
<style>
    body { 
        background: linear-gradient(135deg, #fff0e6, #ffe6cc, #ffd9b3);
        min-height: 100vh;
    }
    .text-orange { color: #ff6600; }
    .btn-orange {
        background: linear-gradient(135deg, #ff9966, #ff6600);
        color: #fff;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .btn-orange:hover {
        background: linear-gradient(135deg, #ff8533, #e65c00);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 6px 15px rgba(255, 102, 0, 0.4);
    }
    .btn-outline-orange {
        border: 2px solid #ff6600;
        color: #ff6600;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .btn-outline-orange:hover {
        background: #ff6600;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 102, 0, 0.3);
    }
    .border-orange {
        border: 2px solid #ff6600 !important;
    }

    /* Animasi elegan */
    .animate-fadein {
        animation: fadeIn 1s ease;
    }
    .animate-slideup {
        animation: slideUp 1s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
