<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $buku = Buku::all();
        return view('buku', ['buku' => $buku]);
    }

    public function add()
    {
        return view('add-buku');
    }

    public function store(Request $request)
    {
        // validasi Input
        $validated = $request->validate([
        'kode_buku' => ['required', 'unique:buku', 'max:255'],
        'title'     => ['required','max:255']
        ]);
    
        $buku = Buku::create($request->all());
        return redirect('buku')->with('status', 'Buku berhasil ditambahkan'); 
    }
}
