<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function profileSekolah()
    {
        return view('user.profile_sekolah');
    }

    public function profileJurusan()
    {
        $jurusan = \App\Models\table_jurusan::all();
        return view('user.profile_jurusan', compact('jurusan'));
    }

    public function prestasi()
    {
        return view('user.prestasi');
    }

    public function fasilitas()
    {
        return view('user.fasilitas');
    }

    public function mekanismePendaftaran()
    {
        return view('user.mekanisme_pendaftaran');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function formulir()
    {
        return view('user.formulir');
    }

    public function biodata()
    {
        return view('user.formulir');
    }

    public function dataOrtu()
    {
        return view('user.ortu');
    }

    public function asalSekolah()
    {
        return view('user.asal_sekolah');
    }

    public function uploadBerkas()
    {
        return view('user.upload_berkas');
    }

    public function pembayaran()
    {
        return view('user.bayar');
    }

    public function monitoring()
    {
        return view('user.monitoring');
    }

    public function daftar()
    {
        $userId = session('user_id');
        $statusPendaftaran = \DB::table('pendaftars')
            ->where('user_id', $userId)
            ->latest()
            ->first();
            
        return view('user.daftar', compact('statusPendaftaran'));
    }

    public function ortu()
    {
        return view('user.ortu');
    }

    public function bayar()
    {
        $userId = session('user_id');
        $statusPembayaran = null;
        
        if($userId) {
            $pendaftar = \DB::table('pendaftars')->where('user_id', $userId)->latest()->first();
            if($pendaftar) {
                $statusPembayaran = \DB::table('pendaftar_pembayarans')
                    ->where('pendaftar_id', $pendaftar->id)
                    ->latest()
                    ->first();
            }
        }
        
        return view('user.bayar', compact('statusPembayaran'));
    }

    public function storeBayar(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $userId = session('user_id');
        $pendaftar = \DB::table('pendaftars')->where('user_id', $userId)->latest()->first();
        
        if(!$pendaftar) {
            return redirect()->route('pengguna.bayar')->with('error', 'Data pendaftar tidak ditemukan!');
        }

        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/pembayaran'), $filename);

        \DB::table('pendaftar_pembayarans')->insert([
            'pendaftar_id' => $pendaftar->id,
            'bukti_pembayaran' => $filename,
            'status' => 'PENDING',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('pengguna.bayar')->with('success', 'Bukti pembayaran berhasil diupload!');
    }

    public function storeDaftar(Request $request)
    {
        $userId = session('user_id') ?? 1;
        $pendaftarId = \DB::table('pendaftars')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->email ?? 'temp' . time() . '@email.com',
            'password' => 'temp123',
            'user_id' => $userId,
            'tanggal_daftar' => now(),
            'no_pendaftaran' => 'REG' . time(),
            'gelombang_id' => 1,
            'jurusan_id' => $request->jurusan_id,
            'status' => 'DRAFT',
            'user_verifikasi_adm' => null,
            'tgl_verifikasi_adm' => null,
            'user_verifikasi_payment' => null,
            'tgl_verifikasi_payment' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('pendaftar_data_siswas')->insert([
            'pendaftar_id' => $pendaftarId,
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'almat' => $request->alamat,
            'wilayah_id' => $request->kelurahan ?? 1,
            'lat' => 0,
            'lng' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('pendaftar_asal_sekolahs')->insert([
            'pendaftar_id' => $pendaftarId,
            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'kabupaten' => $request->kabupaten_sekolah,
            'nilai_rata' => $request->nilai_rata,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('pengguna.daftar')->with('success', 'Data pendaftaran berhasil disimpan!');
    }
    
    public function storeOrtu(Request $request)
    {
        $userId = session('user_id');
        $pendaftarId = \DB::table('pendaftars')->where('user_id', $userId)->latest()->first()->id;
        
        \DB::table('pendaftar_data_ortus')->updateOrInsert(
            ['pendaftar_id' => $pendaftarId],
            [
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'hp_ayah' => $request->hp_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'hp_ibu' => $request->hp_ibu,
                'wali_nama' => $request->wali_nama,
                'wali_hp' => $request->wali_hp,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        
        return redirect()->route('pengguna.ortu')->with('success', 'Data orang tua berhasil disimpan!');
    }
}