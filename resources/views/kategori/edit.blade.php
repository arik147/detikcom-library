@extends('layouts.app', ['activePage' => 'kategori', 'titlePage' => __('')])
@section('content') 
  <div class="container pt-4 bg-white">
    <div class="row">
      <div class="col-md-8 col-xl-6">
        <h1>Insert Kategori</h1>
        <hr>
   
        <form action="{{ route('kategoris.update', ['kategori' => $kategori->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
          @csrf
          <div class="mb-3">
            <label class="form-label" for="nama_kategori">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') ?? $kategori->nama_kategori }}"
              class="form-control @error('nama_kategori') is-invalid @enderror">
            @error('nama_kategori')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
   
          <button type="submit" class="btn btn-primary mb-2">Daftar</button>
        </form>
   
      </div>
    </div>
  </div>
  @endsection
{{-- @include('footer') --}}