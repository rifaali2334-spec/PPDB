<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendaftar_asal_sekolah;

class KepsekController extends Controller
{
    public function dashboard()
    {
        try {
            $chartData = pendaftar_asal_sekolah::select('nama_sekolah', DB::raw('COUNT(*) as jumlah'))
                ->groupBy('nama_sekolah')
                ->orderBy('jumlah', 'desc')
                ->get();
                
            return view('kepsek.dashboard', compact('chartData'));
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}