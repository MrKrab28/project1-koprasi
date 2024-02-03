<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanan';

    protected $fillable = [
        'jumlah_setor',
        'saldo_awal',
        'saldo_akhir',
        'ket',
        'tgl_simpan',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(SimpananItem::class, 'id_simpanan');
    }
}
