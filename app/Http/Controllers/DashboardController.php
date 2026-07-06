<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bukuCount = Buku::count('*');
        $kategoriCount = Kategori::count('*');
        $userCount = User::count('*');
        return view('dashboard', ['buku_count' => $bukuCount, 
        'kategori_count' => $kategoriCount,'user_count'=> $userCount]); 
    }
}
