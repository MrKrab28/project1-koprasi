<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    use HasFactory;


    public function akun(){
        return $this->hasMany(Akun::class, 'no_reff');
    }
}
