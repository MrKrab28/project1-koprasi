<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Carbon\Carbon;
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
        $sisaAngsur = $pinjaman->banyak_angsuran - $pinjaman->angsuran->count();

        if ($sisaAngsur == 1) {
            $angsuran = $pinjaman->total_pinjaman + ($pinjaman->total_pinjaman * $pinjaman->bunga) - $pinjaman->angsuran->sum('nominal_angsuran');
        } else {
            $angsuran = $pinjaman->nominal_angsuran;
        }

        $angsur = new Angsuran();
        $angsur->id_pinjaman = $pinjaman->id;
        $angsur->nominal_angsuran = $angsuran;
        $angsur->tgl_angsur = $request->tgl_angsur;
        if (Carbon::parse($request->tgl_angsur)->gt($pinjaman->jatuh_tempo)) {
            $angsur->denda = $pinjaman->denda * (Carbon::parse($pinjaman->jatuh_tempo)->diffInMonths($request->tgl_angsur) + 1);
            $pinjaman->jatuh_tempo = Carbon::parse($request->tgl_angsur)->addMonth();
        } else {
            $pinjaman->jatuh_tempo = Carbon::parse($pinjaman->jatuh_tempo)->addMonth();
        }
        $angsur->save();

        $pinjaman->update();

        return redirect()->back();
    }
}
