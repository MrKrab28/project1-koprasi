<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Carbon\Carbon;

class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('anggota')) {
            $pinjaman = User::find($request->anggota)->pinjaman;
            return view('admin.pinjaman-detail', compact('pinjaman'));
        }

        $data = [
            'daftarAnggota' => User::all(),
            'daftarPinjaman' => User::has('pinjaman')->get()
        ];

        return view('admin.pinjaman', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'banyak_angsuran' => 'required',
            'tgl_pinjaman' => 'required|date',
            'total_pinjaman' => 'required'
        ]);

        $totalPinjaman = str_replace([',', '.'], '', $request->total_pinjaman);

        $bunga = $request->bunga / 100;
        $angsuran = $totalPinjaman / $request->banyak_angsuran + ($totalPinjaman / $request->banyak_angsuran * $bunga);

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $request->id_anggota;
        $pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
        $pinjaman->jatuh_tempo = Carbon::parse($request->tgl_pinjaman)->addMonth();
        $pinjaman->total_pinjaman = $totalPinjaman;
        $pinjaman->banyak_angsuran = $request->banyak_angsuran;
        $pinjaman->nominal_angsuran = round($angsuran, -3);
        $pinjaman->denda = $request->denda;
        $pinjaman->bunga = $bunga;
        $pinjaman->save();

        $angsuran = new Angsuran();
        $angsuran->id_pinjaman = $pinjaman->id;
        $angsuran->nominal_angsuran = $pinjaman->nominal_angsuran;
        $angsuran->tgl_angsur = $pinjaman->tgl_pinjaman;
        $angsuran->save();


        return redirect()->route('pinjaman-user')->with('success', 'Berhasil Menambahkan Data Pinjaman');
    }
}
