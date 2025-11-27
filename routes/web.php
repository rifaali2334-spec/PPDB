<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\FotoController;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/info_sekolah', function () {
    return view('pages.info_sekolah');
});

Route::get('/jurusan', function () {
    $jurusan = \App\Models\table_jurusan::all();
    return view('pages.jurusan', compact('jurusan'));
})->name('jurusan');

// Auth routes
Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::get('/sign-up', [AuthController::class, 'showRegister'])->name('register');
Route::post('/sign-up', [AuthController::class, 'register']);

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Pengguna management
    Route::get('/pengguna', [AdminController::class, 'pendaftar'])->name('pengguna');
    Route::post('/pengguna', [AdminController::class, 'storePengguna'])->name('pengguna.store');
    Route::put('/pengguna/{id}', [AdminController::class, 'updatePengguna'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [AdminController::class, 'deletePengguna'])->name('pengguna.delete');
    
    // Jurusan management
    Route::get('/jurusan', [AdminController::class, 'jurusan'])->name('jurusan');
    Route::post('/jurusan', [AdminController::class, 'storeJurusan'])->name('jurusan.store');
    Route::put('/jurusan/{id}', [AdminController::class, 'updateJurusan'])->name('jurusan.update');
    Route::delete('/jurusan/{id}', [AdminController::class, 'deleteJurusan'])->name('jurusan.delete');
    

    

});

// User/Pengguna routes
Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile-sekolah', [UserController::class, 'profileSekolah'])->name('profile.sekolah');
    Route::get('/profile-jurusan', [UserController::class, 'profileJurusan'])->name('profile.jurusan');
    Route::get('/prestasi', [UserController::class, 'prestasi'])->name('prestasi');
    Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('fasilitas');
    Route::get('/mekanisme-pendaftaran', [UserController::class, 'mekanismePendaftaran'])->name('mekanisme.pendaftaran');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/formulir', [UserController::class, 'formulir'])->name('formulir');
    Route::get('/biodata', [UserController::class, 'biodata'])->name('biodata');
    Route::get('/data-ortu', [UserController::class, 'dataOrtu'])->name('data.ortu');
    Route::get('/asal-sekolah', [UserController::class, 'asalSekolah'])->name('asal.sekolah');
    Route::get('/upload-berkas', [UserController::class, 'uploadBerkas'])->name('upload.berkas');
    Route::get('/pembayaran', [UserController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/monitoring', [UserController::class, 'monitoring'])->name('monitoring');
    Route::get('/daftar', [UserController::class, 'daftar'])->name('daftar');
    Route::post('/daftar', [UserController::class, 'storeDaftar'])->name('daftar.store');
    Route::get('/ortu', [UserController::class, 'ortu'])->name('ortu');
    Route::post('/ortu', [UserController::class, 'storeOrtu'])->name('ortu.store');
    Route::get('/bayar', [UserController::class, 'bayar'])->name('bayar');
    Route::post('/bayar', [UserController::class, 'storeBayar'])->name('bayar.store');
});

// Calon Siswa routes
Route::prefix('calon-siswa')->name('calon-siswa.')->group(function () {
    Route::get('/', [CalonSiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [CalonSiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/biodata', function () {
        return view('calon_siswa.biodata');
    })->name('biodata');
    Route::get('/formulir', function () {
        return view('calon_siswa.formulir');
    })->name('formulir');
    Route::get('/upload-berkas', [CalonSiswaController::class, 'uploadBerkas'])->name('upload-berkas');
    Route::post('/upload-berkas', [CalonSiswaController::class, 'storeUploadBerkas'])->name('upload-berkas.store');
    Route::get('/monitoring', function () {
        return view('calon_siswa.monitoring');
    })->name('monitoring');
});

// Keuangan routes
Route::prefix('keuangan')->name('keuangan.')->group(function () {
    Route::get('/', [KeuanganController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [KeuanganController::class, 'dashboard'])->name('dashboard');
    Route::get('/verifikasi-pembayaran', [KeuanganController::class, 'verifikasiPembayaran'])->name('verifikasi-pembayaran');
    Route::get('/rekap-pembayaran', [KeuanganController::class, 'rekapPembayaran'])->name('rekap-pembayaran');
    Route::get('/daftar-pembayaran', [KeuanganController::class, 'daftarPembayaran'])->name('daftar-pembayaran');
    Route::post('/verifikasi/terima/{id}', [KeuanganController::class, 'terimaPembayaran'])->name('verifikasi.terima');
    Route::post('/verifikasi/tolak/{id}', [KeuanganController::class, 'tolakPembayaran'])->name('verifikasi.tolak');
});

// Panitia routes
Route::prefix('panitia')->name('panitia.')->group(function () {
    Route::get('/', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/data-pendaftar', [PanitiaController::class, 'dataPendaftar'])->name('data.pendaftar');
    Route::get('/verifikasi-data', [PanitiaController::class, 'verifikasiData'])->name('verifikasi.data');
    Route::post('/verifikasi-data/{id}', [PanitiaController::class, 'updateStatus'])->name('update.status');
});

// Kepala Sekolah routes
Route::prefix('kepala-sekolah')->name('kepsek.')->group(function () {
    Route::get('/', [\App\Http\Controllers\KepsekController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\KepsekController::class, 'dashboard'])->name('dashboard');
});

// Test route
Route::get('/test-kepsek', function() {
    return 'Kepsek route works!';
});

// API routes
Route::get('/api/kelurahan/{district_id}', function($district_id) {
    $villages = \DB::table('villages')->where('district_id', $district_id)->get();
    return response()->json($villages);
});

// Upload foto routes
Route::get('/upload-foto', function () {
    return view('upload_foto');
})->name('upload.foto.form');
Route::post('/upload-foto', [FotoController::class, 'upload'])->name('upload.foto');

// Logout route
Route::post('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');