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
        'id_anggota',
        'saldo',
        ];

    public function items(): HasMany
    {
        return $this->hasMany(SimpananItem::class, 'id_simpanan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
