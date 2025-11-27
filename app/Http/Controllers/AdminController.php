<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar;
use App\Models\table_jurusan;
use App\Models\gelombang;
use App\Models\pengguna;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPendaftar = pendaftar::count();
        $totalJurusan = table_jurusan::count();
        $totalPengguna = pengguna::count();
        $gelombangAktif = gelombang::where('status', 'aktif')->first();
        
        return view('admin.dashboard', compact('totalPendaftar', 'totalJurusan', 'totalPengguna', 'gelombangAktif'));
    }

    public function pendaftar()
    {
        $pengguna = DB::table('penggunas')->get();
        return view('admin.views.pages.pengguna', compact('pengguna'));
    }

    public function storePengguna(Request $request)
    {
        DB::table('penggunas')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password_hash' => $request->password,
            'role' => $request->role,
            'hp' => $request->hp,
            'aktif' => $request->aktif ?? 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function updatePengguna(Request $request, $id)
    {
        DB::table('penggunas')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password_hash' => $request->password,
                'role' => $request->role,
                'hp' => $request->hp,
                'aktif' => $request->aktif ?? 1,
                'updated_at' => now()
            ]);
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diupdate');
    }

    public function deletePengguna($id)
    {
        DB::table('penggunas')->where('id', $id)->delete();
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    public function jurusan()
    {
        $jurusan = table_jurusan::all();
        return view('admin.jurusan', compact('jurusan'));
    }

    public function kelolaJurusan()
    {
        $jurusan = table_jurusan::all();
        return view('admin.jurusan', compact('jurusan'));
    }

    public function storeJurusan(Request $request)
    {
        table_jurusan::create([
            'nama' => $request->nama_jurusan,
            'kode' => $request->kode_jurusan,
            'kuota' => $request->kuota
        ]);
        return redirect()->route('admin.jurusan')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function updateJurusan(Request $request, $id)
    {
        $jurusan = table_jurusan::findOrFail($id);
        $jurusan->update([
            'nama' => $request->nama_jurusan,
            'kode' => $request->kode_jurusan,
            'kuota' => $request->kuota
        ]);
        return redirect()->route('admin.jurusan')->with('success', 'Jurusan berhasil diupdate');
    }

    public function deleteJurusan($id)
    {
        table_jurusan::findOrFail($id)->delete();
        return redirect()->route('admin.jurusan')->with('success', 'Jurusan berhasil dihapus');
    }

    public function dataSiswa()
    {
        $dataSiswa = DB::table('pendaftar_data_siswas')->get();
        return view('admin.data-siswa', compact('dataSiswa'));
    }

    public function storeDataSiswa(Request $request)
    {
        $pendaftarId = DB::table('pendaftars')->insertGetId([
            'nama' => $request->nama,
            'email' => 'temp' . time() . '@email.com',
            'password' => 'temp123',
            'user_id' => 1,
            'tanggal_daftar' => now(),
            'no_pendaftaran' => 'REG' . time(),
            'gelombang_id' => 1,
            'jurusan_id' => 1,
            'status' => 'SUBMIT',
            'user_verifikasi_adm' => 'admin',
            'tgl_verifikasi_adm' => now(),
            'user_verifikasi_payment' => 'admin',
            'tgl_verifikasi_payment' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pendaftar_data_siswas')->insert([
            'pendaftar_id' => $pendaftarId,
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'almat' => $request->almat,
            'wilayah_id' => 1,
            'lat' => 0,
            'lng' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function updateDataSiswa(Request $request, $id)
    {
        DB::table('pendaftar_data_siswas')
            ->where('pendaftar_id', $id)
            ->update([
                'nik' => $request->nik,
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'almat' => $request->almat,
                'updated_at' => now()
            ]);

        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil diupdate');
    }

    public function deleteDataSiswa($id)
    {
        DB::table('pendaftar_data_siswas')->where('pendaftar_id', $id)->delete();
        DB::table('pendaftars')->where('id', $id)->delete();
        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    public function kelolaGelombang()
    {
        $gelombang = gelombang::all();
        return view('admin.gelombang', compact('gelombang'));
    }

    public function kelolaWilayah()
    {
        $wilayah = \App\Models\wilayah::all();
        return view('admin.wilayah', compact('wilayah'));
    }

    public function storeGelombang(Request $request)
    {
        gelombang::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status ?? 'nonaktif'
        ]);
        return redirect()->route('admin.kelola.gelombang')->with('success', 'Gelombang berhasil ditambahkan');
    }

    public function updateGelombang(Request $request, $id)
    {
        $gelombang = gelombang::findOrFail($id);
        $gelombang->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status ?? 'nonaktif'
        ]);
        return redirect()->route('admin.kelola.gelombang')->with('success', 'Gelombang berhasil diupdate');
    }

    public function deleteGelombang($id)
    {
        gelombang::findOrFail($id)->delete();
        return redirect()->route('admin.kelola.gelombang')->with('success', 'Gelombang berhasil dihapus');
    }

    public function storeWilayah(Request $request)
    {
        \App\Models\wilayah::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe ?? 'Umum',
            'aktif' => $request->aktif ?? 1
        ]);
        return redirect()->route('admin.kelola.wilayah')->with('success', 'Wilayah berhasil ditambahkan');
    }

    public function updateWilayah(Request $request, $id)
    {
        $wilayah = \App\Models\wilayah::findOrFail($id);
        $wilayah->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe ?? 'Umum',
            'aktif' => $request->aktif ?? 1
        ]);
        return redirect()->route('admin.kelola.wilayah')->with('success', 'Wilayah berhasil diupdate');
    }

    public function deleteWilayah($id)
    {
        \App\Models\wilayah::findOrFail($id)->delete();
        return redirect()->route('admin.kelola.wilayah')->with('success', 'Wilayah berhasil dihapus');
    }
}