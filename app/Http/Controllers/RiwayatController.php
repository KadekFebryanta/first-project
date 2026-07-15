<?php

namespace App\Http\Controllers;

use App\Models\RentalLogs;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = RentalLogs::with(['user', 'buku'])->get();
        return view('riwayat', ['riwayat' => $riwayat]);
    }
}
