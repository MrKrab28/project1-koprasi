<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
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
