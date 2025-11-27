<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar;
use App\Models\pendaftar_data_siswa;
use App\Models\pendaftar_data_ortu;
use App\Models\pendaftar_berkas;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();
        $pendaftar = pendaftar::where('user_id', $userId)->first();
        
        $statusPendaftaran = 'Belum Daftar';
        $statusBerkas = 'Belum Upload';
        $statusPembayaran = 'Belum Bayar';
        
        if ($pendaftar) {
            $dataSiswa = pendaftar_data_siswa::where('pendaftar_id', $pendaftar->id)->first();
            $dataOrtu = pendaftar_data_ortu::where('pendaftar_id', $pendaftar->id)->first();
            $berkas = pendaftar_berkas::where('pendaftar_id', $pendaftar->id)->first();
            
            if ($dataSiswa && $dataOrtu) {
                $statusPendaftaran = 'Lengkap';
            } else {
                $statusPendaftaran = 'Belum Lengkap';
            }
            
            if ($berkas) {
                $statusBerkas = 'Sudah Upload';
            }
            
            switch ($pendaftar->status) {
                case 'SUBMIT':
                    $statusPembayaran = 'Menunggu Verifikasi';
                    break;
                case 'ADM_PASS':
                    $statusPembayaran = 'Verifikasi Diterima';
                    break;
                case 'ADM_REJECT':
                    $statusPembayaran = 'Verifikasi Ditolak';
                    break;
                case 'PAID':
                    $statusPembayaran = 'Sudah Bayar';
                    break;
                default:
                    $statusPembayaran = 'Belum Bayar';
            }
        }
        
        return view('calon_siswa.dashboard', compact('statusPendaftaran', 'statusBerkas', 'statusPembayaran'));
    }

    public function biodata()
    {
        return view('calon_siswa.biodata');
    }

    public function formulir()
    {
        return view('calon_siswa.formulir');
    }

    public function monitoring()
    {
        $userId = Auth::id();
        $pendaftar = pendaftar::where('user_id', $userId)->first();
        
        $dataSiswa = null;
        $dataOrtu = null;
        $berkas = null;
        
        if ($pendaftar) {
            $dataSiswa = pendaftar_data_siswa::where('pendaftar_id', $pendaftar->id)->first();
            $dataOrtu = pendaftar_data_ortu::where('pendaftar_id', $pendaftar->id)->first();
            $berkas = pendaftar_berkas::where('pendaftar_id', $pendaftar->id)->first();
        }
        
        return view('calon_siswa.monitoring', compact('pendaftar', 'dataSiswa', 'dataOrtu', 'berkas'));
    }

    public function uploadBerkas()
    {
        $userId = Auth::id();
        $pendaftar = pendaftar::where('user_id', $userId)->first();
        $berkas = null;
        
        if ($pendaftar) {
            $berkas = pendaftar_berkas::where('pendaftar_id', $pendaftar->id)->get();
        }
        
        return view('calon_siswa.upload_berkas', compact('berkas'));
    }

    public function storeUploadBerkas(Request $request)
    {
        $userId = Auth::id();
        $pendaftar = pendaftar::where('user_id', $userId)->first();
        
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Data pendaftar tidak ditemukan');
        }
        
        $request->validate([
            'jenis' => 'required|in:IJAZAH,RAPORT,KIP,KKS,AKTA,KK,LAINNYA',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('berkas', $fileName, 'public');
            
            pendaftar_berkas::create([
                'pendaftar_id' => $pendaftar->id,
                'jenis' => $request->jenis,
                'nama_file' => $fileName,
                'url' => $filePath,
                'ukuran_kb' => round($file->getSize() / 1024),
                'valid' => 0,
                'catatan' => ''
            ]);
            
            return redirect()->back()->with('success', 'Berkas berhasil diupload');
        }
        
        return redirect()->back()->with('error', 'Gagal mengupload berkas');
    }
}