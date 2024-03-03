<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisSimpanan;
use App\Models\Penarikan;
use App\Models\SimpananItem;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('jenis')) {
            $data = [
                'jenis' => JenisSimpanan::find($request->jenis),
                'daftarSimpanan' => Simpanan::where('id_jenis', $request->jenis)->get(),
                'daftarAnggota' => User::all()
            ];

            return view('admin.simpanan', $data);
        } else {
            abort(404);
        }
    }

    public function detail(Request $request)
    {

        if ($request->has('id')) {
            $simpanan = Simpanan::find($request->id);

            return view('admin.simpanan-detail', compact('simpanan'));
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'id_anggota' => 'required',
            'jumlah_setor' => 'required',
            'tgl_simpan' => 'required|date',
        ]);


        //    $user =  Simpananitem::create($data);
        $simpanan = new Simpanan();
        $simpanan->id_anggota = $request->id_anggota;
        $simpanan->id_jenis = $request->jenis;
        $simpanan->save();

        $item = new SimpananItem();
        $item->id_simpanan = $simpanan->id;
        $item->jumlah_setor = str_replace([',', '.'], '', $request->jumlah_setor);
        $item->tgl_simpan = $request->tgl_simpan;
        $item->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Simpanan');
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'id_simpanan' => 'required',
            'jumlah_setor' => 'required',
            'tgl_simpan' => 'required'
        ]);

        $item = new SimpananItem();
        $item->id_simpanan = $request->id_simpanan;
        $item->jumlah_setor = str_replace([',', '.'], '', $request->jumlah_setor);
        $item->tgl_simpan = $request->tgl_simpan;
        $item->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Setor Simpanan');
    }
}
