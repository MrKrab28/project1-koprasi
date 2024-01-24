<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.anggota');
    }

    public function buruh() {
        echo "coba";
    }
}
