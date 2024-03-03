<?php

namespace App\Http\Controllers\User;

use App\Models\Simpanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function dataSimpanan(Request $request)
    {
        if ($request->has('jenis')) {
            $data = [
                'simpanan' => Simpanan::where('id_jenis', $request->jenis)->where('id_anggota', auth()->user()->id)->first(),
            ];

            return  view('anggota.simpanan', $data);
        } else {
            return abort(404);
        }
    }
}
