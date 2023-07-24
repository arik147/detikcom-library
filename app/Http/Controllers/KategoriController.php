<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = kategori::all();
        return view('kategori.index', ['kategoris' => $kategoris]);
    }

    public function create(){
        $kategoris = kategori::all();
        return view('kategori.create', ['kategoris' => $kategoris]);
    }

    public function store(Request $request){
        
        $validateData = $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategoris = new kategori();
        $kategoris->nama_kategori = $validateData['nama_kategori'];
        $kategoris->save();
        return redirect()->route('kategoris.index')->with('pesan', "Kategori $kategoris->nama_kategori berhasil ditambah");
    }

    public function edit(kategori $kategori){
        $kategoris = kategori::all();
        return view('kategori.edit', [ 'kategori' => $kategori]);
    }
    public function update(Request $request, kategori $kategori){
        
        $validateData = $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' .$kategori->id,
        ]);
       
        kategori::where('id', $kategori->id)->update($validateData);
        return redirect()->route('kategoris.index')->with('pesan', "Kategori dengan judul $kategori->nama_kategori berhasil ditambah");
    }

    public function destroy(kategori $kategori){
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('pesan', "Hapus data $kategori->nama_kategori Berhasil");
    }
}
