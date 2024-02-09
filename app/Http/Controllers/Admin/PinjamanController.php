<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    public function index(Request $request){
        if($request->has('anggota')){
            $user = User::find($request->anggota);
            return view('admin.pinjaman-detail', compact('user'));
        }
    $users = User::has('pinjaman')->get();
        return view('admin.pinjaman', compact('users'));
    }

    public function store(Request $request){

        $request->validate([
            'id_anggota' => 'required',
            'tgl_pinjaman' => 'required|date',
            'total_pinjaman' => 'required|numeric'
        ]);

            $pinjaman = new Pinjaman();
            $pinjaman->id_anggota = $request->id_anggota;
            $pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
            $pinjaman->total_pinjaman = $request->total_pinjaman;
            $pinjaman->save();


            return redirect()->route('pinjaman-user');
    }



    public function angsuran(Request $request){

        $request->validate([
            'id_anggota' => 'required',
            'jumlah_angsuran' => 'required|numeric',
            'tgl_bayar' => 'required|date'
        ]);
    }


}
