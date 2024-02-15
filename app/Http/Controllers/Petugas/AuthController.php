<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('petugas.Auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('Petugas')->attempt($credentials)) {
            return redirect()->route('petugas-authenticate');
        }

        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('petugas-login');
    }
}
