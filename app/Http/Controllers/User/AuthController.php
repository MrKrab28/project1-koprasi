<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.anggota');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('anggota')->attempt($credentials)) {
            return redirect()->route('user-dashboard')->with('success', 'Berhasil Login');
        }

        return redirect()->back()->with('LoginError', 'Email atau Password Salah');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard(){
        return view('layout');
    }
}
