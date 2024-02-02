<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_setor',
        'saldo_awal',
        'saldo_akhir',
        'ket',
        'tgl_simpan',
    ];






    public function anggota()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function norek(){
        return $this->hasOne(Pinjaman::class, 'no_rekening');
    }
}
