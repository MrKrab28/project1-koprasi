<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\User;

use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        return view('admin.simpanan');
    }

    public function getSimpanan(){
        $user = User::with('simpanan');

        return view('admin.simpanan', compact('user'));
    }
}
