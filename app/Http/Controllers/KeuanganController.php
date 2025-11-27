<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function dashboard()
    {
        $totalPembayaran = DB::table('pendaftars')->count();
        $menungguVerifikasi = DB::table('pendaftar_pembayarans')->where('status', 'PENDING')->count();
        $sudahVerifikasi = DB::table('pendaftar_pembayarans')->where('status', 'VERIFIED')->count();
        $totalBerkas = DB::table('pendaftar_pembayarans')->count();
        
        return view('keuangan.dashboard', compact('totalPembayaran', 'menungguVerifikasi', 'sudahVerifikasi', 'totalBerkas'));
    }

    public function verifikasiPembayaran()
    {
        $pembayaran = DB::table('pendaftar_pembayarans')
            ->leftJoin('pendaftars', 'pendaftar_pembayarans.pendaftar_id', '=', 'pendaftars.id')
            ->leftJoin('pendaftar_data_siswas', 'pendaftars.id', '=', 'pendaftar_data_siswas.pendaftar_id')
            ->select(
                'pendaftar_pembayarans.id',
                'pendaftar_pembayarans.bukti_pembayaran',
                'pendaftar_pembayarans.status',
                'pendaftar_pembayarans.created_at',
                'pendaftars.no_pendaftaran',
                'pendaftar_data_siswas.nama as nama_siswa'
            )
            ->orderBy('pendaftar_pembayarans.created_at', 'desc')
            ->get();
        
        return view('keuangan.verifikasi-pembayaran', compact('pembayaran'));
    }

    public function rekapPembayaran(Request $request)
    {
        $query = DB::table('pendaftar_pembayarans')
            ->leftJoin('pendaftars', 'pendaftar_pembayarans.pendaftar_id', '=', 'pendaftars.id')
            ->leftJoin('pendaftar_data_siswas', 'pendaftars.id', '=', 'pendaftar_data_siswas.pendaftar_id')
            ->select(
                'pendaftar_pembayarans.id',
                'pendaftar_pembayarans.bukti_pembayaran',
                'pendaftar_pembayarans.status',
                'pendaftar_pembayarans.created_at',
                'pendaftars.no_pendaftaran',
                'pendaftar_data_siswas.nama as nama_siswa'
            );

        if ($request->tanggal_mulai) {
            $query->whereDate('pendaftar_pembayarans.created_at', '>=', $request->tanggal_mulai);
        }
        
        if ($request->tanggal_selesai) {
            $query->whereDate('pendaftar_pembayarans.created_at', '<=', $request->tanggal_selesai);
        }
        
        $rekap = $query->orderBy('pendaftar_pembayarans.created_at', 'desc')->get();
        
        return view('keuangan.rekap-pembayaran', compact('rekap'));
    }

    public function daftarPembayaran()
    {
        $daftarPembayaran = DB::table('pendaftar_pembayarans')
            ->join('pendaftars', 'pendaftar_pembayarans.pendaftar_id', '=', 'pendaftars.id')
            ->join('pendaftar_data_siswas', 'pendaftars.id', '=', 'pendaftar_data_siswas.pendaftar_id')
            ->join('table_jurusans', 'pendaftars.jurusan_id', '=', 'table_jurusans.id')
            ->select('pendaftar_pembayarans.*', 'pendaftars.no_pendaftaran', 'pendaftar_data_siswas.nama as nama_siswa', 'pendaftar_data_siswas.nik', 'table_jurusans.nama as jurusan')
            ->get();
        
        return view('keuangan.daftar-pembayaran', compact('daftarPembayaran'));
    }

    public function terimaPembayaran($id)
    {
        DB::table('pendaftar_pembayarans')
            ->where('id', $id)
            ->update([
                'status' => 'VERIFIED',
                'updated_at' => now()
            ]);
        
        return redirect()->route('keuangan.verifikasi-pembayaran')->with('success', 'Pembayaran berhasil diterima dan diverifikasi');
    }

    public function tolakPembayaran($id)
    {
        DB::table('pendaftar_pembayarans')
            ->where('id', $id)
            ->update([
                'status' => 'REJECTED',
                'updated_at' => now()
            ]);
        
        return redirect()->route('keuangan.verifikasi-pembayaran')->with('success', 'Pembayaran berhasil ditolak');
    }
}