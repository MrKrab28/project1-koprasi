<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penarikan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function penarikan(Request $request)
    {
        if ($request->has('id')) {
            $penarikan = Simpanan::find($request->id)->penarikan;
            return view('admin.penarikan', compact('penarikan'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_simpanan' => 'required',
            'jumlah_penarikan' => 'required',
            'tgl_penarikan' => 'required',
            'waktu_penarikan' => 'required'
        ]);

        $simpanan = Simpanan::find($request->id_simpanan);

        if ($simpanan->saldo > $request->jumlah_penarikan) {
            $penarikan = new Penarikan();
            $penarikan->id_simpanan = $simpanan->id;
            $penarikan->jumlah_penarikan =  $request->jumlah_penarikan;
            $penarikan->tgl_penarikan = $request->tgl_penarikan;
            $penarikan->waktu_penarikan = $request->waktu_penarikan;
            $penarikan->save();

            return redirect()->back()->with('success', 'Berhasil Melakukan penarikan');
        }

        return redirect()->back()->with('error', 'Saldo tidak cukup');
    }
}
