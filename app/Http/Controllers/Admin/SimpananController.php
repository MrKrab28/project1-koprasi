<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SimpananItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeUnit\FunctionUnit;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('anggota')) {
            $user = User::find($request->anggota);

            return view('admin.simpanan-detail', compact('user'));
        }

        $users = User::has('simpanan')->get();

        return view('admin.simpanan', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|unique:simpanan,id_anggota',
            'jumlah_setor' => 'required|numeric',
            'tgl_simpan' => 'required|date',
        ]);


    //    $user =  Simpananitem::create($data);
        $simpanan = new Simpanan();
        $simpanan->id_anggota = $request->id_anggota;
        $simpanan->save();

       $item = new SimpananItem();
       $item->id_simpanan = $simpanan->id;
       $item->jumlah_setor = $request->jumlah_setor;
       $item->tgl_simpan = $request->tgl_simpan;
       $item->save();
       return redirect()->route('simpanan-user');
    }

    public function storeItem(Request $request) {
        $request->validate([
            'anggota' => 'required',
            'jumlah_setor' => 'required'
        ]);

        $user = User::find($request->anggota);

        $item = new SimpananItem();
        $item->id_simpanan = $user->simpanan->id;
        $item->jumlah_setor = $request->jumlah_setor;
        $item->tgl_simpan = $request->tgl_simpan;
        $item->save();

        return redirect()->back();
    }

}
