<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\RentalLogs;
use App\Models\User;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bukuCount = Buku::count('*');
        $kategoriCount = Kategori::count('*');
        $userCount = User::count('*');
        $riwayat = RentalLogs::with(['user', 'buku'])->get();
        return view('dashboard', ['buku_count' => $bukuCount, 
        'kategori_count' => $kategoriCount,'user_count'=> $userCount, 'riwayat' => $riwayat]); 
        
    }
}
