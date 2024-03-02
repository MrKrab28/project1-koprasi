<?php

namespace App\Http\Controllers\User;

use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    public function dataPinjaman(){
        $pinjaman = Pinjaman::where('id_anggota', Auth::user()->id)->get();

       return  view('anggota.pinjaman', compact('pinjaman'));
    }

}
