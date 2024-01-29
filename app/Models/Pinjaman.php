<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_pinjaman',
        'lama_pinjam',
        'bunga',
        'ket',
        'tgl_peminjaman',
        'tgl_jatuhTempo',
        'lama_angsuran'
    ];



    public function pinjaman()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
