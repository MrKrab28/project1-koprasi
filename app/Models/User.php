<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'foto_ktp',
        'nik',
        'jk',
        'no_rekening',

    ];

    public function pinjaman(): HasMany
    {
        return $this->hasMany(Pinjaman::class, 'id_anggota');
    }


    public function simpanan(): HasOne
    {
        return $this->hasOne(Simpanan::class, 'id_anggota');
    }

    public function simpanan_items(): HasManyThrough
    {
        return $this->hasManyThrough(SimpananItem::class, Simpanan::class, 'id_anggota', 'id_simpanan');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
