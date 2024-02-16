<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.anggota', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'no_hp' => 'required|unique:users,no_hp',
            // 'foto_ktp' => 'required',
            'nik' => 'required|unique:users,nik',
            'jk' => 'required',
            'no_rekening' => 'required|unique:users,no_rekening',
            'tgl_bergabung' => 'required|date',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);


        return redirect()->route('user-index')->with('success', 'Berhasil Mendaftarkan Anggota');
    }

    public function edit(User $user)
    {
        return view('admin.anggota-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
            // $request->validate([
            //     'jk' => 'in:P,L'
            // ]);

        $foto = $request->file('foto_ktp');

        $user = User::find($user->id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jk = $request->jk;
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

        return redirect()->route('user-index')->with('Success', 'Berhasi Mengubah Data');

    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
