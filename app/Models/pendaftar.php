<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftar extends Model
{
    protected $fillable = ['nama', 'email', 'password', 'status'];
    protected $hidden = ['password'];
}
