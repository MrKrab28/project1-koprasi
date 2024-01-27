<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;



    public function simpanan()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
