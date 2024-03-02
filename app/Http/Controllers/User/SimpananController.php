<?php

namespace App\Http\Controllers\User;

use App\Models\Simpanan;
use App\Http\Controllers\Controller;
use App\Models\JenisSimpanan;
use App\Models\SimpananItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function dataSimpanan(Request $request)
    {
        if ($request->has('jenis')) {
        $data = [
            // 'jenis' => JenisSimpanan::find($request->jenis),
            'daftarSimpanan' => Simpanan::where('id_jenis', $request->jenis)->get(),
            'simpananUser' => SimpananItem::where('id_simpanan', Auth::user()->id)->get(),
            // 'daftarAnggota' => Simpanan::where('id_anggota', Auth::user()->id)->get()
        ];





       return  view('anggota.simpanan', $data);

    }else{
    return abort(404);
    }
}
}
