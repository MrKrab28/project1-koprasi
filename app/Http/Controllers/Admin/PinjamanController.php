<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('anggota')) {
            $pinjaman = User::find($request->anggota)->pinjaman;
            return view('admin.pinjaman-detail', compact('pinjaman'));
        }
        $users = User::has('pinjaman')->get();
        return view('admin.pinjaman', compact('users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_anggota' => 'required',
            'banyak_angsuran' => 'required',
            // 'jumlah_angsuran' => 'required',
            'tgl_pinjaman' => 'required|date',
            'total_pinjaman' => 'required|numeric'
        ]);

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $request->id_anggota;
        $pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
        $pinjaman->total_pinjaman = $request->total_pinjaman;
        $pinjaman->banyak_angsuran = $request->banyak_angsuran;
        $pinjaman->nominal_angsuran = $pinjaman->total_pinjaman / $pinjaman->banyak_angsuran + ($pinjaman->total_pinjaman / $pinjaman->banyak_angsuran * 0.1);
        $pinjaman->save();

        $angsuran = new Angsuran();
        $angsuran->id_pinjaman = $pinjaman->id;
        $angsuran->nominal_angsuran = $pinjaman->nominal_angsuran;
        $angsuran->tgl_angsur = $pinjaman->tgl_pinjaman;
        $angsuran->save();


        return redirect()->route('pinjaman-user');
    }


    public function angsuran(Request $request){

        $request->validate([
            'anggota' => 'required',
            'tgl_angsur'
        ]);

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $request->id_anggota;
        $pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
        $pinjaman->total_pinjaman = $request->total_pinjaman;
        $pinjaman->save();

        $angsuran = new Angsuran();
        $angsuran->id_pinjaman = $pinjaman->id;
        $angsuran->banyak_angsuran = $request->banyak_angsuran;
        $angsuran->nominal_angsuran = $pinjaman->total_pinjaman / $angsuran->banyak_angsuran;
        $angsuran->tanggal_angsur = $request->tanggal_angsur;
        $angsuran->save();
    }



    // public function angsuran(Request $request)
    // {

    //     $request->validate([
    //         'id_anggota' => 'required',
    //         'jumlah_angsuran' => 'required|numeric',
    //         'tgl_bayar' => 'required|date'
    //     ]);
    // }
}
