<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftar_berkas extends Model
{
    protected $table = 'pendaftar_berkas';
    
    protected $fillable = [
        'pendaftar_id',
        'jenis',
        'nama_file',
        'url',
        'ukuran_kb',
        'valid',
        'catatan'
    ];
}
