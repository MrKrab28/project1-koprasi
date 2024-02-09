<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index(){
    $user = User::all();
    return view('admin.anggota', compact('user'));
   }

   Public function store(Request $request){
    $data = $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'no_hp' => 'required|unique:users,no_hp',
        // 'foto_ktp' => 'required',
        'nik' => 'required|unique:users,nik',
        'jk' => 'required',
        'no_rekening' => 'required|unique:users,no_rekening',
    ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);


        return redirect()->route('login')->with('success', 'Berhasil Mendaftar Sebagai Anggota');
   }

   public function edit(User $user){
    return view('admin.anggota-edit', compact('user'));
}
}
