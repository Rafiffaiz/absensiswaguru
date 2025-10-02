@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center fw-bold shadow-sm rounded-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-5 text-center fw-bold text-orange-gradient">
        <i class="bi bi-journal-check"></i> Rekap Absen Kelas {{ $kelas }}
    </h2>

    @forelse($rekap as $absen)
        <div class="card mb-4 border-0 shadow-lg rounded-4 rekap-card">
            <div class="card-body d-flex align-items-center">
                
                {{-- Foto Absen --}}
                @if($absen->foto)
                    <img src="{{ asset('storage/' . $absen->foto) }}" 
                         alt="foto" 
                         class="rekap-photo">
                @else
                    <div class="rekap-photo d-flex justify-content-center align-items-center bg-light text-muted">
                        <i class="bi bi-person-x fs-1"></i>
                    </div>
                @endif

                {{-- Info Siswa --}}
                <div class="ms-3">
                    <h5 class="fw-bold mb-2 text-dark">{{ $absen->siswa->username }}</h5>
                    <p class="mb-1 text-muted"><strong>Jurusan:</strong> {{ $absen->siswa->jurusan }}</p>
                    <p class="mb-2 text-muted"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</p>
                    <span class="badge badge-elegant">✅ Hadir</span>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center shadow-lg rounded-3 fw-bold">
            Belum ada data absen untuk kelas <span class="text-orange-gradient">{{ $kelas }}</span>.
        </div>
    @endforelse
</div>

{{-- Custom Styles --}}
<style>
    body {
        background: linear-gradient(135deg, #fff3e6, #ffe0cc);
    }
    .text-orange-gradient {
        background: linear-gradient(45deg, #ff6600, #ff9966, #ffcc80);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .rekap-card {
        background: linear-gradient(145deg, #fff, #fff8f0);
        transition: all 0.4s ease;
        border: 1px solid rgba(255, 153, 102, 0.4);
    }
    .rekap-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 10px 25px rgba(255, 153, 102, 0.6);
    }
    .rekap-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%; /* bikin bulat */
        object-fit: cover;
        border: 3px solid #ff9966;
        box-shadow: 0 0 20px rgba(255, 153, 102, 0.6);
        background: #fff;
    }
    .badge-elegant {
        background: linear-gradient(45deg, #ff6600, #ff9966, #ffcc80);
        color: #fff;
        font-weight: bold;
        border-radius: 12px;
        padding: 8px 18px;
        box-shadow: 0 5px 15px rgba(255, 153, 102, 0.6);
        font-size: 0.95rem;
    }
</style>
@endsection
