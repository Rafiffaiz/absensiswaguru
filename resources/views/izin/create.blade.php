@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        {{-- Header dengan gradient --}}
        <div class="card-header text-white text-center py-3" 
             style="background: linear-gradient(135deg, #ff9966, #ff6600, #ff8533);">
            <h3 class="fw-bold mb-0">📝 Ajukan Izin</h3>
        </div>
        <div class="card-body" style="background: linear-gradient(135deg, #fff5f0, #ffe6cc);">
            <form action="{{ route('izin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold text-orange">Alasan Izin</label>
                    <textarea name="keterangan" rows="4" class="form-control border-orange rounded-3" 
                              placeholder="Masukkan alasan izin..." required></textarea>
                </div>
                <button type="submit" class="btn w-100 fw-bold"
                        style="background: linear-gradient(135deg, #ff9966, #ff6600); color: #fff; border-radius: 8px;">
                    Kirim Izin
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
