<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
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
        $kategories = Kategori::all();
        return view('add-buku', ['kategories'=> $kategories]);
    }

    public function store(Request $request)
    {
        // validasi Input
        $validated = $request->validate([
        'kode_buku' => ['required', 'unique:buku', 'max:255'],
        'title'     => ['required','max:255']
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extention = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extention;
            $request->file('image')->storeAs('cover', $newName);
        }
    
        $request['cover'] = $newName;
        $buku = Buku::create($request->all());
        $buku->kategories()->sync($request->kategories);
        return redirect('buku')->with('status', 'Buku berhasil ditambahkan'); 
    }

    public function edit($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $kategories = Kategori::all();
        return view('edit-buku', ['kategories' => $kategories, 'buku' => $buku]);
    }

    public function update(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('image')) {
            $extention = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extention;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $buku = Buku::where('slug', $slug)->first();
        $buku->update($request->all());

        if($request->kategories) {
            $buku->kategories()->sync($request->kategories);
        }

        return redirect('buku')->with('status', 'Buku berhasil diperbarui!'); 
    }

    public function delete($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        return view('delete-buku', ['buku' => $buku]);
    }

    public function destroy($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $buku->delete();
        return redirect('buku')->with('status', 'Buku berhasil dihapus');
    }

    public function deleteview()
    {
        $deleteView = Buku::onlyTrashed()->get();
        return view('delete-list-buku', ['deleteView' => $deleteView]);
    }

    public function restore($slug)
    {
        $buku = Buku::withTrashed()->where('slug', $slug)->first();
        $buku->restore();
        return redirect('buku')->with('status', 'Data buku berhasil dikembalikan');
    }
}
