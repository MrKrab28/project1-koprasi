<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananItem extends Model
{
    use HasFactory;

    protected $table = 'simpanan_item';

    public function user()
    {
       
    }
}
