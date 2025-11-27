<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar_berkas;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pendaftar_id' => 'required|integer'
        ]);

        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/foto', $filename, 'public');

        pendaftar_berkas::create([
            'pendaftar_id' => $request->pendaftar_id,
            'jenis' => 'LAINNYA',
            'nama_file' => $filename,
            'url' => $path,
            'ukuran_kb' => round($file->getSize() / 1024),
            'valid' => 1,
            'catatan' => 'Foto pendaftar'
        ]);

        return response()->json(['success' => true, 'message' => 'Foto berhasil disimpan']);
    }
}