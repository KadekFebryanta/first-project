<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori', ['kategori' => $kategori]);
    }

    public function tambahKategori()
    {
        return view('tambah-kategori');
    }

    public function store(Request $request)
    {
        // validasi Input
        $validated = $request->validate([
        'name' => ['required', 'unique:kategoris', 'max:100']
        ]);

        $kategori = Kategori::create($request->all());
        return redirect('kategori')->with('status', 'Tambah kategori berhasil');

    }

    public function edit($slug) 
    {
        $kategori = Kategori::where('slug', $slug)->first();
        return view('edit-kategori', ['kategori' => $kategori]);
    }

    public function update(Request $request, $slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
        'name' => ['required', 'unique:kategoris,name,' . $kategori->id, 'max:100']
        // 'name' => ['required', 'unique:kategoris', 'max:100']
        ]);
    
        $kategori->name = $validated['name'];
        $kategori->slug = null; // reset agar Sluggable generate ulang
        $kategori->save();
        // $kategori->update($request->all());
        return redirect('kategori')->with('status', 'Update kategori berhasil');
    }

    public function delete($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        return view('delete-kategori', ['kategori'=> $kategori]);
        }
        
        
    public function destroy($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $kategori->delete();
        return redirect('kategori')->with('status', 'Delete kategori berhasil');
    }

    public function deleteView()
    {
        $deleteView = Kategori::onlyTrashed()->get();
        return view('delete-list-kategori', ['deleteView' => $deleteView]);
    }

    public function restore($slug)
    {
        $kategori = Kategori::withTrashed()->where('slug', $slug)->first();
        $kategori->restore();
        return redirect('kategori')->with('status', 'Data kategori berhasil dikembalikan');
    }
}
