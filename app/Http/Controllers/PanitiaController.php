<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar;

class PanitiaController extends Controller
{
    public function dashboard()
    {
        $totalPendaftar = pendaftar::count();
        $dataVerifikasi = pendaftar::where('status', 'ADM_PASS')->count();
        $menungguVerifikasi = pendaftar::where('status', 'SUBMIT')->count();
        
        return view('panitia.dashboard', compact('totalPendaftar', 'dataVerifikasi', 'menungguVerifikasi'));
    }
    
    public function dataPendaftar()
    {
        $pendaftars = pendaftar::all();
        return view('panitia.data-pendaftar', compact('pendaftars'));
    }
    
    public function verifikasiData()
    {
        $pendaftars = pendaftar::all();
        return view('panitia.verifikasi-berkas', compact('pendaftars'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $status = $request->status;
        
        pendaftar::where('id', $id)->update([
            'status' => $status,
            'user_verifikasi_adm' => 'panitia',
            'tgl_verifikasi_adm' => now()
        ]);
        
        return response()->json(['success' => true, 'message' => 'Status berhasil diupdate']);
    }
}