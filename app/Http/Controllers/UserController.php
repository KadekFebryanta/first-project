<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
        // $request->session()->flush();
        // dd('halaman profile');
    }

    public function index()
    {
        return view('user');
    }
}
