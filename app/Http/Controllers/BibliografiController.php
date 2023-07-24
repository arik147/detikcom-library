<?php

namespace App\Http\Controllers;

use App\Models\bibliografi;
use App\Models\kategori;
use Illuminate\Http\Request;
use PDF;

class BibliografiController extends Controller
{
    public function index(){

        $bibliografis = bibliografi::all();
        $kategoris = kategori::all();

        $status = false;
        
        return view('bibliografi.index', ['bibliografis' => $bibliografis, 'kategoris' => $kategoris, 'status' => $status]);
    }

    public function filter(Request $request){

        if ($request->has('kategori')){

            $bibliografis = bibliografi::where('kategori_id', $request['kategori'])->get();

        }else{
            $bibliografis = bibliografi::all();
        }

        $status = true;

        $kategoris = kategori::all();
        
        return view('bibliografi.index', ['bibliografis' => $bibliografis, 'kategoris' => $kategoris, 'status' => $status]);
    }

    public function create(){
        $kategoris = kategori::all();
        return view('bibliografi.create', ['kategoris' => $kategoris]);
    }

    public function store(Request $request){
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $file_image = $request->file('gambar')->getClientOriginalName();
            $filename_image = pathinfo($file_image, PATHINFO_FILENAME);
            $extension_image = $request->file('gambar')->getClientOriginalExtension();
            $final_image = $filename_image.'_'.time().'.'.$extension_image;
            $image->move(public_path('/img'), $final_image);
        }else{
            $final_image = "noimg.jpg";
        }

        if($request->hasFile('file_buku')){
            $file_buku = $request->file('file_buku');
            $file = $request->file('file_buku')->getClientOriginalName();
            $filename_buku = pathinfo($file, PATHINFO_FILENAME);
            $extension_buku = $request->file('file_buku')->getClientOriginalExtension();
            $final_file = $filename_buku.'_'.time().'.'.$extension_buku;
            $file_buku->move(public_path('/file_buku'), $final_file);
        }else{
            $final_file = "nofile.pdf";
        }
        
        $validateData = $request->validate([
            'judul' => 'required',
            'edisi' => '',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'isbn' => 'required|size:10',
            'kategori' => '',
            'jumlah' => '',
            'sinopsis' => '',
            'gambar' => '',
            'file_buku' => ''
        ]);
        $bibliografis = new bibliografi();
        $bibliografis->judul = $validateData['judul'];
        $bibliografis->edisi = $validateData['edisi'];
        $bibliografis->penulis = $validateData['penulis'];
        $bibliografis->penerbit = $validateData['penerbit'];
        $bibliografis->tahun = $validateData['tahun'];
        $bibliografis->sinopsis = $validateData['sinopsis'];
        $bibliografis->kategori_id = $validateData['kategori'];
        $bibliografis->isbn = $validateData['isbn'];
        $bibliografis->jumlah_halaman = $validateData['jumlah'];
        $bibliografis->gambar = $final_image;
        $bibliografis->file_buku = $final_file;
        $bibliografis->save();
        return redirect()->route('bibliografis.index')->with('pesan', "Bibliografi dengan judul $bibliografis->judul berhasil ditambah");
    }

    public function show($id){
        $bibliografis = bibliografi::where('id', $id)->first();
        $bibliografi2 = bibliografi::all();
        return view('bibliografi.show', ['bibliografis' => $bibliografis, 'bibliografi2' => $bibliografi2]);
    }

    public function edit(bibliografi $bibliografi){
        $kategoris = kategori::all();
        return view('bibliografi.edit', ['bibliografi' => $bibliografi, 'kategoris' => $kategoris]);
    }

    public function update(Request $request, bibliografi $bibliografi){
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $file = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $final = $filename.'_'.time().'.'.$extension;
            $image->move(public_path('/img'), $final);
        }else{
            $final = "noimg.jpg";
        }

        if($request->hasFile('file_buku')){
            $file_buku = $request->file('file_buku');
            $file = $request->file('file_buku')->getClientOriginalName();
            $filename_buku = pathinfo($file, PATHINFO_FILENAME);
            $extension_buku = $request->file('file_buku')->getClientOriginalExtension();
            $final_file = $filename_buku.'_'.time().'.'.$extension_buku;
            $file_buku->move(public_path('/file_buku'), $final_file);
        }else{
            $final_file = "nofile.pdf";
        }
        
        $validateData = $request->validate([
            'judul' => 'required|unique:bibliografis,judul,' .$bibliografi->id,
            'edisi' => '',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'isbn' => 'required|size:10',
            'kategori_id' => '',
            'jumlah_halaman' => '',
            'sinopsis' => '',
            'gambar' => '',
            'file_buku' => ''
        ]);
       
        bibliografi::where('id', $bibliografi->id)->update($validateData);

        if($request->hasFile('gambar')){
            bibliografi::where('id', $bibliografi->id)->update(['gambar' => $final]);
        }

        if($request->hasFile('file_buku')){
            bibliografi::where('id', $bibliografi->id)->update(['file_buku' => $final_file]);
        }

        return redirect()->route('bibliografis.show', ['bibliografi' => $bibliografi->id])->with('pesan', "Bibliografi dengan judul $bibliografi->judul berhasil ditambah");
    }
    
    public function destroy(bibliografi $bibliografi){
        $bibliografi->delete();
        return redirect()->route('bibliografis.index')->with('pesan', "Hapus data $bibliografi->judul Berhasil");
    }

    public function exportPDF() {
        $bibliografis = bibliografi::all();
        $kategoris = kategori::all();

        $pdf = PDF::loadview('bibliografi.pdf_view', ['bibliografis' => $bibliografis, 'kategoris' => $kategoris]);
        return $pdf->download('bibliografi.pdf');

    }

}
