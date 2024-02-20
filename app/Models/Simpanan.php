<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanan';

    protected $fillable = [
        'id_anggota',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(SimpananItem::class, 'id_simpanan');
    }

    public function penarikan(){
        return $this->hasMany(Penarikan::class, 'id_simpanan');
    }

    public function jenis(){
        return $this->belongsTo(JenisSimpanan::class, 'id_jenis');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function saldo(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->items->sum('jumlah_setor') - $this->penarikan->sum('jumlah_penarikan')
        );
    }
}
