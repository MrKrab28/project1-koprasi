<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('pinjaman')) {
            $pinjaman = Pinjaman::find($request->pinjaman);
            return view('admin.angsuran', compact('pinjaman'));
        } else {
            abort(404);
        }

    }

    public function store(Request $request){



        $request->validate([

            'tgl_angsur' => 'required',
            'pinjaman' => 'required'
        ]);

        $pinjaman =  Pinjaman::find($request->pinjaman);

        $angsur = new Angsuran();
        $angsur->id_pinjaman = $pinjaman->id;
        $angsur->nominal_angsuran = $pinjaman->nominal_angsuran;
        $angsur->tgl_angsur = $request->tgl_angsur;
        $angsur->save();

        return redirect()->back();
    }
}
