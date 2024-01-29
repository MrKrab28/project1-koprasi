<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function index(User $user){
        $user = User::all();
        return view('admin.anggota', compact('user'));
    }

    public function Store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'no_hp' => 'required|unique:users,no_hp',
            'foto_ktp' => 'required',
            'nik' => 'required|unique:users,nik',
            'jk' => 'required',
            'no_rekening' => 'required|unique:users,no_rekening',
        ]);

            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            event(new Registered($user));

            return redirect()->route('index.user')->with('success', 'Berhasil Mendaftar Sebagai Anggota');

    }


        public function edit(User $user)
        {
            return view('admin.anggota', compact('user'));
        }

        public function update(Request $request, User $user)
        {
            $foto = $request->file('foto_ktp');

            $user = User::find($user->id);

            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->no_hp = $request->no_hp;
            // $user->foto_ktp = $request->foto_ktp;
            $user->no_rekening = $request->no_rekening;

            if ($foto)
            {
                File::delete(public_path('f/foto_ktp' . $user->foto_ktp));
                $filename = 'user-' . time() . '.' . $foto->extension();
                $user->foto_ktp = $filename;
                $foto->move(public_path('f/foto_ktp'), $filename);
            }

            $user->update();

            return redirect()->back()->with('Success', 'Berhasi Mengubah Data');

        }

        public function delete(User $user)
        {
            $user->delete();
            return redirect()->route('index.user');
        }



}
