<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSimpanan;
use Illuminate\Http\Request;

class JenisSimpananController extends Controller
{
    public function index(){
        $jenis_simpanan = JenisSimpanan::all();
        return view('admin.jenisSimpanan', compact('jenis_simpanan'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required'
        ]);

        $jenis_simpanan = new JenisSimpanan();
        $jenis_simpanan->nama = $request->nama;
        $jenis_simpanan->jumlah = $request->jumlah;
        $jenis_simpanan->save();

        return redirect()->route('jenisSimpanan-index');
    }

    public function edit(JenisSimpanan $jenis){
        return view('admin.jenisSimpanan-edit', compact('jenis'));
    }

    public function update(Request $request, JenisSimpanan $jenis){
        $request->validate([
            'nama' => 'required',
            'jumlah' =>'required'
        ]);

        $jenis = JenisSimpanan::find($jenis->id);
        $jenis->nama = $request->nama;
        $jenis->jumlah = $request->jumlah;
        $jenis->update();

        return redirect()->route('jenisSimpanan-index');
    }

    public function delete(JenisSimpanan $jenis){
        $jenis->delete();
        return redirect()->back();
    }
}
