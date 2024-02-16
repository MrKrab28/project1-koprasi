<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(){
        $pemasukan = Pemasukan::all();
        return view('admin.pemasukan', compact('pemasukan'));
    }

    public function store(Request $request){
        $request->validate([
            'sumber_pemasukan' => 'required',
            'jumlah_pemasukan' => 'required',
            'tgl_pemasukan' => 'required',
            'keterangan' => 'required',
        ]);

        $pemasukan = new Pemasukan();
        $pemasukan->sumber_pemasukan = $request->sumber_pemasukan;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan;
        $pemasukan->keterangan = $request->keterangan;
        $pemasukan->save();

        return redirect()->route('pemasukan-index');
    }

    public function edit(Pemasukan $pemasukan){
        return view('admin.pemasukan-edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan){

        $pemasukan = Pemasukan::find($pemasukan->id);
        $pemasukan->sumber_pemasukan = $request->sumber_pemasukan;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan;
        $pemasukan->keterangan = $request->keterangan;
        $pemasukan->update();

        return redirect()->route('pemasukan-index');

    }

    public function delete(Pemasukan $pemasukan){
        $pemasukan->delete();

        return redirect()->back();
    }
}
