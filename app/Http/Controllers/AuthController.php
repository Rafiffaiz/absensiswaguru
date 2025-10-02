<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ============================================================
       REGISTER SISWA
    ============================================================ */
    public function showRegisterSiswa()
    {
        $jurusan = ['RPL', 'MP', 'TKJ'];
        $kelas   = ['X', 'XI', 'XII'];

        return view('auth.register-siswa', compact('jurusan', 'kelas'));
    }

    public function registerSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:siswas',
            'password' => 'required|min:5',
            'jurusan'  => 'required',
            'kelas'    => 'required',
        ]);

        Siswa::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'jurusan'  => $request->jurusan,
            'kelas'    => $request->kelas,
        ]);

        return redirect()->route('siswa.login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    /* ============================================================
       LOGIN SISWA
    ============================================================ */
    public function showLoginSiswa()
    {
        return view('auth.login-siswa');
    }

    public function loginSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $siswa = Siswa::where('username', $request->username)->first();

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            session(['siswa' => $siswa]);
            return redirect()->route('siswa.home')->with('success', 'Login berhasil, selamat datang ' . $siswa->username . '!');
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    public function logoutSiswa()
    {
        session()->forget('siswa');
        return redirect()->route('siswa.login')->with('success', 'Logout berhasil!');
    }

    /* ============================================================
       REGISTER GURU
    ============================================================ */
    public function showRegisterGuru()
    {
        return view('auth.register-guru');
    }

    public function registerGuru(Request $request)
    {
        $request->validate([
            'nama'     => 'required|unique:gurus,nama',
            'mapel'    => 'required',
            'password' => 'required|min:6'
        ]);

        Guru::create([
            'nama'     => $request->nama,
            'mapel'    => $request->mapel,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('guru.login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    /* ============================================================
       LOGIN GURU
    ============================================================ */
    public function showLoginGuru()
    {
        return view('auth.login-guru');
    }

    public function loginGuru(Request $request)
{
    $request->validate([
        'nama'     => 'required',
        'password' => 'required',
    ]);

    $guru = Guru::where('nama', $request->nama)->first();

    if (!$guru) {
        return back()->with('error', 'Guru tidak ditemukan!');
    }

    if (!Hash::check($request->password, $guru->password)) {
        return back()->with('error', 'Password salah!');
    }

    session(['guru' => $guru]);
    return redirect()->route('guru.home')->with('success', 'Login berhasil, selamat datang ' . $guru->nama . '!');
}
    public function logoutGuru()
    {
        session()->forget('guru');
        return redirect()->route('guru.login')->with('success', 'Logout berhasil!');
    }
}
