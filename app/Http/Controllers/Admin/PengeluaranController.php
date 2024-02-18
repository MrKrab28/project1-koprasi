<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluaran = Pengeluaran::all();
        return view('admin.pengeluaran', compact('pengeluaran'));
    }

    public function store(Request $request){
        $request->validate([
            'jumlah_pengeluaran' => 'required',
            'tujuan_pengeluaran' => 'required',
            'keterangan' => 'required',
            'tgl_pengeluaran' => 'required',
        ]);

        $pengeluaran = new Pengeluaran();
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->tujuan_pengeluaran = $request->tujuan_pengeluaran;
        $pengeluaran->tgl_pengeluaran = $request->tgl_pengeluaran;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->save();

        return redirect()->route('pengeluaran-index');
    }

    public function edit(Pengeluaran $pengeluaran){
       return view('admin.pengeluaran-edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran){
        $request->validate([
            'jumlah_pengeluaran' => 'required',
            'tujuan_pengeluaran' => 'required',
            'tgl_pengeluaran' => 'required',
            'keterangan' => 'required',

        ]);

        $pengeluaran = Pengeluaran::find($pengeluaran->id);
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->tujuan_pengeluaran = $request->tujuan_pengeluaran;
        $pengeluaran->tgl_pengeluaran = $request->tgl_pengeluaran;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->update();

        return redirect()->route('pengeluaran-index');
    }

    public function delete(Pengeluaran $pengeluaran){
        $pengeluaran->delete();
        return redirect()->back();
    }
}
