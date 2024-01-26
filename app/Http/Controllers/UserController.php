<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user){
        $user = User::all();
        return view('admin.anggota', compact('user'));
    }

    public function Store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'foto_ktp' => 'required',
            'nik' => 'required|unique',
            'jk' => 'required',
        ]);

            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            event(new Registered($user));

    }


}
