<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    public function angsuran(): HasMany
    {
        return $this->hasMany(Angsuran::class, 'id_pinjaman');
    }

    public function sisa(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->total_pinjaman + ($this->total_pinjaman * $this->bunga) - $this->angsuran->sum('nominal_angsuran')
        );
    }

    public function lunas(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->total_pinjaman + ($this->total_pinjaman * $this->bunga) == $this->angsuran->sum('nominal_angsuran')
        );
    }
}
