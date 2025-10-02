<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\GuruRekap; // <--- Tambah model GuruRekap

class AbsenController extends Controller
{
    /* ============================================================
       UNTUK SISWA
    ============================================================ */
    // Halaman utama absen siswa
    public function index()
    {
        if (!session()->has('siswa')) {
            return redirect()->route('siswa.login')->with('error', 'Silakan login dulu');
        }
        return view('home-siswa');
    }

    // Simpan absen siswa
    public function store(Request $request)
    {
        if (!session()->has('siswa')) {
            return redirect()->route('siswa.login')->with('error', 'Silakan login dulu');
        }

        $request->validate([
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('foto')->store('absen', 'public');

        Absen::create([
            'siswa_id' => session('siswa')->id,
            'foto'     => $path,
            'tanggal'  => now()->format('Y-m-d'),
        ]);

        return redirect()->route('rekap.kelas', ['kelas' => session('siswa')->kelas])
                         ->with('success', 'Absen berhasil!');
    }

    // Rekap per kelas (siswa lihat kelasnya)
    public function rekap($kelas)
    {
        if (!session()->has('siswa')) {
            return redirect()->route('siswa.login')->with('error', 'Silakan login dulu');
        }

        $kelas = strtoupper($kelas);

        $rekap = Absen::with('siswa')
            ->whereHas('siswa', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('rekap', compact('rekap', 'kelas'));
    }

    /* ============================================================
       UNTUK GURU
    ============================================================ */
    // Halaman home guru
    public function homeGuru()
    {
        if (!session()->has('guru')) {
            return redirect()->route('guru.login')->with('error', 'Silakan login dulu');
        }
        return view('home-guru');
    }
    
    // Simpan absen guru
    public function storeGuru(Request $request)
    {
        if (!session()->has('guru')) {
            return redirect()->route('guru.login')->with('error', 'Silakan login dulu');
        }

        $request->validate([
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $pathFoto = $request->file('foto')->store('absen', 'public');

        // Simpan ke tabel gurus_rekap
        if (!session()->has('guru')) {
        return redirect()->route('guru.login')->with('error', 'Silakan login dulu');
    }

    $request->validate([
        'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        // kalau kelas / keterangan dikirim dari form, validasi juga
    ]);

    $pathFoto = $request->file('foto')->store('absen', 'public');

    // buat data ke tabel gurus_rekap, PASTIKAN guru_id disertakan
    GuruRekap::create([
        'guru_id'     => session('guru')->id,      // <--- penting
        'siswa_id'    => $request->siswa_id ?? null,
        'foto'        => $pathFoto,
        'tanggal'     => now()->format('Y-m-d'),
        'kelas'       => $request->kelas ?? null,
        'keterangan'  => $request->keterangan ?? 'Hadir',
    ]);

    return redirect()->route('guru.home')->with('success', 'Absen berhasil');
    }

    // Rekap absensi guru (semua kelas / per kelas)
    public function rekapGuru($kelas = null)
    {
        if (!session()->has('guru')) {
            return redirect()->route('guru.login')->with('error', 'Silakan login dulu');
        }

        $query = GuruRekap::with('siswa')->orderBy('tanggal', 'desc');

        if ($kelas) {
            $query->where('kelas', strtoupper($kelas));
        }

        $rekap = $query->get();

        return view('guru.rekap', compact('rekap', 'kelas'));
    }
}
