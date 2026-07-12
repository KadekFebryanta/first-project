<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        if ($request->kategori || $request->title) {
            $buku = Buku::where('title', 'like', '%'.$request->title.'%')
                ->orWhereHas('kategories', function ($q) use ($request) {
                    $q->where('kategoris.id', $request->kategori);
                })->get();
        }
        else {
            $buku = Buku::all();
        }
        return view('list-buku', ['buku' => $buku, 'kategoris' => $kategoris]);
    }
}
