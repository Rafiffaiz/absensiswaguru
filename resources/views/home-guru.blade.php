@extends('layouts.apps')

@section('content')
<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden animate-fadein">
        {{-- Header dengan gradient --}}
        <div class="card-header text-white text-center py-4" 
             style="background: linear-gradient(135deg, #ff9966, #ff6600, #ff8533);">
            <h2 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">
                <i class="bi bi-journal-bookmark-fill"></i> Dashboard Guru
            </h2>
        </div>

        <div class="card-body p-4" style="background: linear-gradient(135deg, #fff5f0, #ffe6cc);">
            {{-- Info guru login --}}
            @if(session('guru'))
                <div class="alert border-0 rounded-4 shadow-sm animate-slideup mb-4" 
                     style="background: linear-gradient(135deg, #ffe6cc, #ffd1b3); color:#663300;">
                    <p class="mb-1"><strong>👨‍🏫 Nama Guru:</strong> {{ session('guru')->nama }}</p>
                    <p class="mb-0"><strong>📘 Mata Pelajaran:</strong> {{ session('guru')->mapel }}</p>
                </div>
            @endif

            {{-- Alert sukses & error --}}
            @if(session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mt-3 animate-slideup">
                    ✅ {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger border-0 rounded-4 shadow-sm mt-3 animate-slideup">
                    ❌ {{ session('error') }}
                </div>
            @endif

            {{-- Form absen guru --}}
            <div class="mt-4 animate-fadein">
                <form action="{{ route('guru.absen') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">📷 Upload Foto Absen</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-orange w-100 py-2 fw-bold shadow-sm mb-3">
                        <i class="bi bi-check-circle"></i> Absen Sekarang
                    </button>
                </form>

                {{-- Menu guru --}}
                <a href="{{ route('rekap.guru') }}" class="btn btn-outline-orange w-100 py-2 fw-bold shadow-sm mb-3">
                    <i class="bi bi-clipboard-data"></i> Lihat Rekap Absen
                </a>

                {{-- Tombol Izin --}}
                <a href="{{ route('izin.guru.dashboard') }}" class="btn btn-outline-orange w-100 mt-3 py-2 fw-bold shadow-sm animate-fadein mb-3">
                    <i class="bi bi-journal-x"></i> Ajukan Izin & Rekap Izin
                </a>

                {{-- Tombol Logout --}}
                <a href='/' class="btn btn-outline-dark w-100 py-2 fw-bold shadow-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>

        </div>
    </div>
</div>

{{-- Custom Style --}}
<style>
    body { 
        background: linear-gradient(135deg, #fff0e6, #ffe6cc, #ffd9b3);
        min-height: 100vh;
    }
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
