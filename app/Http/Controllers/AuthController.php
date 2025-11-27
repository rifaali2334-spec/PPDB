<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\pendaftar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.masuk');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $pengguna = pengguna::where('email', $request->email)->first();
        
        if ($pengguna && $request->password === $pengguna->password_hash) {
            session(['user_id' => $pengguna->id, 'email' => $pengguna->email, 'role' => $pengguna->role]);
            
            switch ($pengguna->role) {
                case 'admin':
                    return redirect('/admin');
                case 'calon siswa':
                    return redirect('/calon-siswa');
                case 'panitia':
                    return redirect('/panitia');
                case 'keuangan':
                    return redirect('/keuangan');
                case 'kepala sekolah':
                    return redirect('/kepala-sekolah');
                default:
                    return redirect('/pengguna');
            }
        }

        return back()->withErrors(['login' => 'Email atau password salah']);
    }

    public function showRegister()
    {
        return view('pages.sign-up');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'password' => 'required|min:6'
        ]);

        pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'password_hash' => $request->password,
            'role' => 'user',
            'aktif' => 1
        ]);

        return redirect('/masuk')->with('success', 'Pendaftaran berhasil, silakan login');
    }
}