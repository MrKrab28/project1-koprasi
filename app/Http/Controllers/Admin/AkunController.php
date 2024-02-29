<?php

namespace App\Http\Controllers\Admin;

use App\Models\Akun;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataAkun;

class AkunController extends Controller
{

    public function index()
    {
        $akun = DataAkun::all();

        return view('admin.akun',  compact('akun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_reff' => 'required',
            'nama_reff' => 'required',
            'keterangan' => 'required',
            'tgl_daftarAkun' => 'required',
        ]);

        $akun = new DataAkun();
        $akun->no_reff = $request->no_reff;
        $akun->nama_reff = $request->nama_reff;
        $akun->keterangan = $request->keterangan;
        $akun->tgl_daftarAkun = $request->tgl_daftarAkun;
        $akun->save();

        return redirect()->route('dataAkun-index')->with('success', 'Data Akun Berhasil Ditambahkan');
    }

    public function edit(DataAkun $akun)
    {
        return view('admin.akun-edit', compact('akun'));
    }

    public function update(Request $request, DataAkun $akun)
    {
        $akun = DataAkun::find($akun->no_reff);
        $akun->no_reff = $request->no_reff;
        $akun->nama_reff = $request->nama_reff;
        $akun->keterangan = $request->keterangan;
        $akun->tgl_daftarAkun = $request->tgl_daftarAkun;
        $akun->update();

        return redirect()->route('dataAkun-index')->with('success', 'Data Berhasil di Update');
    }

    public function delete(DataAkun $akun)
    {
        $akun->delete();
        return redirect()->back()->with('success', 'Data Akun Berhasil di Hapus');
    }
}
