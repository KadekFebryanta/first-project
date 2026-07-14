<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class RentBukuController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $buku = Buku::all();
        return view('rent-buku', ['users' => $users], ['buku' => $buku]);
    }
}
