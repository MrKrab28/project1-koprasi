<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'no_hp',
        'password',
        'foto',
        'id_prodi',
        'active',
        'level'
    ];

    public function pinjaman()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
