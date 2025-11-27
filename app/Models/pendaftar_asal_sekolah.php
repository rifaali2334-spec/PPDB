<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftar_asal_sekolah extends Model
{
    protected $table = 'pendaftar_asal_sekolahs';
    protected $fillable = ['npsn', 'nama_sekolah', 'kabupaten', 'nilai_rata'];
}
