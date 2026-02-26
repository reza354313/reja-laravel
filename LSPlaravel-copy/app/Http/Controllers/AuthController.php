<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function loginAnggota(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $anggota = Anggota::where('username', $credentials['username'])->first();

        if ($anggota && $anggota->password === $credentials['password']) {
            session(['anggota_id' => $anggota->id_anggota]);
            session(['anggota_name' => $anggota->nama_anggota]);
            return redirect('/peminjaman-saya');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function registerAnggota(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register_anggota');
        }

        $validated = $request->validate([
            'nis' => 'required|unique:anggota,nis',
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'username' => 'required|unique:anggota,username',
            'password' => 'required|min:6'
        ]);

        Anggota::create($validated);

        return redirect('/login-anggota-page')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget(['anggota_id', 'anggota_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
