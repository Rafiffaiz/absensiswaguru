@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Card Utama --}}
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden animate-fadein">

        {{-- Header --}}
        <div class="card-header text-white text-center py-4" 
             style="background: linear-gradient(135deg, #ff9966, #ff6600, #ff8533);">
            <h2 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">
                <i class="bi bi-journal-check"></i> Rekap Izin Siswa
            </h2>
        </div>

        <div class="card-body p-4" style="background: linear-gradient(135deg, #fff5f0, #ffe6cc);">

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success text-center fw-bold shadow-sm rounded-3 mb-4 animate-slideup">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Tabel Rekap Izin --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center shadow-sm rounded-3 overflow-hidden">
                    <thead class="table-warning">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Tanggal</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($izin as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-bold">{{ $row->nama ?? 'Tidak diketahui' }}</td>
                                <td>{{ $row->kelas ?? '-' }}</td>
                                <td>{{ $row->jurusan ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</td>
                                <td>{{ $row->keterangan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted text-center">Belum ada izin yang diajukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tombol Ajukan Izin --}}
            <div class="text-center mt-4">
                <a href="{{ route('izin.create') }}" class="btn btn-warning fw-bold shadow-sm">
                    <i class="bi bi-plus-circle"></i> Ajukan Izin
                </a>
            </div>

           
               
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
    .animate-fadein { animation: fadeIn 1s ease; }
    .animate-slideup { animation: slideUp 1s ease; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
