<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    protected $table = 'penarikan';
    use HasFactory;

    public function simpanan(){
      return $this->belongsTo(Simpanan::class,'id_simpanan');
    }
}
