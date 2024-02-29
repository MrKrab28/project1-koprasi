<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.admin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }

        if (Auth::guard('petugas')->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }

        return redirect()->back()->with('LoginError', 'Email atau Password Salah');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin-login');
    }
}
