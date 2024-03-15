<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Authenticatable
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'jk',
        'jabatan',
        'tgl_bergabung',
        'email',
        'password',
    ];
}
