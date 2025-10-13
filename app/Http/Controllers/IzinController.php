<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

class IzinController extends Controller
{
    // Halaman form izin
    public function index()
    {
        if (!session()->has('siswa')) {
            return redirect('/login');
        }

        return view('izin.create'); // form izin tanpa foto
    }

    // Simpan izin
    public function store(Request $request)
    {
        if (!session()->has('siswa')) {
            return redirect('/login');
        }

        $request->validate([
            'keterangan' => 'required|string|max:255',
        ]);

        $siswa = session('siswa');

        // Ambil data siswa dari session
        $namaSiswa    = $siswa->nama ?? $siswa->nama_siswa ?? $siswa->username ?? $siswa->name ?? 'Tanpa Nama';
        $kelasSiswa   = $siswa->kelas ?? 'Tidak Diketahui';
        $jurusanSiswa = $siswa->jurusan ?? 'Tidak Diketahui';

        // Simpan ke tabel izins
        Izin::create([
            'siswa_id'   => $siswa->id,
            'nama'       => $namaSiswa,
            'kelas'      => $kelasSiswa,
            'jurusan'    => $jurusanSiswa,
            'keterangan' => $request->keterangan,
            'tanggal'    => now()->toDateString(),
        ]);

        return redirect()->route('izin.dashboard')->with('success', 'Izin berhasil disimpan');
    }

    // Dashboard izin untuk semua siswa
    public function dashboard()
    {
        if (!session()->has('siswa')) {
            return redirect('/login');
        }

        $siswa = session('siswa');

        // Ambil semua data izin, urut dari terbaru
        $izin = Izin::orderBy('created_at', 'desc')->get();

        return view('izin.dashboard', compact('izin', 'siswa'));
    }

    // Rekap semua izin (untuk guru)
    public function rekap(Request $request)
    {
        $query = Izin::orderBy('tanggal', 'desc');

        if ($request->filled('kelas')) {
            $kelasFilter = $request->kelas;
            $query->where('kelas', $kelasFilter);
        }

        $izin = $query->get();

        return view('izin.rekap', [
            'izin'  => $izin,
            'kelas' => $request->kelas ?? null
        ]);
    }

    // Hapus izin
    public function destroy($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->delete();

        return redirect()->route('izin.dashboard')->with('success', 'Izin berhasil dihapus');
    }
    public function create()
{
    // return view form create izin
    return view('izin.create');
}

}
