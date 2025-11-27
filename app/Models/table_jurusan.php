<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = ['kode', 'nama', 'kuota'];
}
