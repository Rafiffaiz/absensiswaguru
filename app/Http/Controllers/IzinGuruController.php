<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IzinGuru;

class IzinGuruController extends Controller
{
    // 🔥 Dashboard rekap semua izin guru
    public function dashboard()
    {
        if (!session()->has('guru')) {
            return redirect('/guru/login');
        }

        $guru = session('guru');

        // Ambil semua izin, terbaru duluan
        $izin = IzinGuru::orderBy('created_at', 'desc')->get();

        return view('izin.guru.dashboard', compact('izin', 'guru'));
    }

    // Form create izin (GET)
    public function create()
    {
        if (!session()->has('guru')) {
            return redirect('/guru/login');
        }

        return view('izin.guru.create');
    }

    // Simpan izin (POST)
    public function store(Request $request)
    {
        if (!session()->has('guru')) {
            return redirect('/guru/login');
        }

        $request->validate([
            'keterangan' => 'required|string|max:255',
        ]);

        $guru = session('guru');

        IzinGuru::create([
            'guru_id'    => $guru->id,
            'nama'       => $guru->nama ?? 'Tidak diketahui',   // jaga-jaga kalau field kosong
            'mapel'      => $guru->mapel ?? 'Belum diatur',
            'keterangan' => $request->keterangan,
            'tanggal'    => now()->toDateString(),
        ]);

        return redirect()->route('izin.guru.dashboard')->with('success', 'Izin berhasil disimpan');
    }

    // Hapus izin (DELETE)
    public function destroy($id)
    {
        $izin = IzinGuru::findOrFail($id);

        // Cegah guru lain menghapus izin yang bukan miliknya
        if (session()->has('guru') && $izin->guru_id != session('guru')->id) {
            return redirect()->route('izin.guru.dashboard')->with('error', 'Aksi tidak diizinkan');
        }

        $izin->delete();

        return redirect()->route('izin.guru.dashboard')->with('success', 'Izin berhasil dihapus');
    }
}
