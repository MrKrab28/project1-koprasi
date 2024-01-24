<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('layout');
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard');

        }
        return redirect()->back()->with('LoginError', 'Email atau Password Salah');
    }




}
