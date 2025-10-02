@extends('layouts.apps')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <h2 class="mb-5 text-center fw-bold text-orange-gradient">
        <i class="bi bi-journal-check"></i>
        Rekap Izin Guru
    </h2>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center fw-bold shadow-sm rounded-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Rekap --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-warning">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Mapel</th>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($izin as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $row->nama ?? 'Tidak diketahui' }}</td>
                            <td>{{ $row->mapel ?? 'Belum diatur' }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</td>
                            <td>{{ $row->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">Belum ada izin yang diajukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tombol Ajukan Izin --}}
    <div class="text-center mt-4">
        <a href="{{ route('izin.guru.create') }}" class="btn btn-warning fw-bold">
            <i class="bi bi-plus-circle"></i> Ajukan Izin
        </a>
    </div>
</div>

{{-- Styles --}}
<style>
    .text-orange-gradient {
        background: linear-gradient(135deg, #ff9966, #ff6600);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endsection
