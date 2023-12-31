<?php

namespace App\Http\Controllers;
use App\Models\bibliografi;
use App\Models\kategori;
// use App\Models\member;
// use App\Models\sirkulasi;
// use App\Models\pengembalian;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bibliografis = bibliografi::all();
        $kategoris = kategori::all();
        // $member = member::all();
        // $sirkulasi = sirkulasi::all();
        // $pengembalian = pengembalian::all();
        return view('dashboard', ['bibliografis' => $bibliografis, 'kategoris' => $kategoris]);
    }
}
