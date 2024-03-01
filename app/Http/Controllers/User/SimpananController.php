<?php

namespace App\Http\Controllers\User;

use App\Models\Simpanan;
use App\Http\Controllers\Controller;
use App\Models\SimpananItem;
use Illuminate\Support\Facades\Auth;

class SimpananController extends Controller
{
    public function dataSimpanan()
    {
       $simpanan = Simpanan::where('id_anggota', Auth::user()->id)->get();

       return  view('anggota.simpanan', compact('simpanan'));

    }
}
