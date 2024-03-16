<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class DashboardController extends Controller
{
    public function index()
    {
       $daftarPinjaman = Pinjaman::all();
       $pinjamanBelumLunas = [];

        foreach ($daftarPinjaman as $pinjaman) {
            if (!$pinjaman->lunas){
                $pinjamanBelumLunas[] = $pinjaman;
            }
        }
        $data = [
            'pinjamanBelumLunas' => count($pinjamanBelumLunas),
            'anggota' => User::all()->count(),
            'petugas' => Petugas::all()->count(),
        ];
        return view('admin.dashboard', $data);
    }

}

