<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    protected $table = 'data_akun';
    protected $primaryKey ='no_reff';
    // protected $fillable = ['no_reff'];
    use HasFactory;
}
