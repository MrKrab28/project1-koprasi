<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\User;

use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        $user = User::has('simpanan')->get();

        return view('admin.simpanan', compact('user'));
    }
}
