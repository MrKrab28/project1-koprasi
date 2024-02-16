<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    public function index(){

         $petugas = Petugas::all();
         return view('admin.petugas', compact('petugas'));
    }


    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tgl_bergabung' => 'required|date',
        ]);
        $petugas = new Petugas();
        $petugas->nama = $request->nama;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->jk = $request->jk;
        $petugas->jabatan = $request->jabatan;
        $petugas->email = $request->email;
        $petugas->password = bcrypt($request->password);
        $petugas->tgl_bergabung = $request->tgl_bergabung;
        $petugas->save();

        return redirect()->route('petugas-index');
    }

    public function edit(Petugas $petugas){
        return view('admin.petugas-edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas){

        $petugas = Petugas::find($petugas->id);
        $petugas->nama = $request->nama;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->jk = $request->jk;
        $petugas->jabatan = $request->jabatan;
        $petugas->email = $request->email;
        $petugas->password = bcrypt($request->password) ;
        $petugas->update();

        return redirect()->route('petugas-index');
    }

    public function delete(Petugas $petugas){
        $petugas->delete();
        return redirect()->back();
    }


}
