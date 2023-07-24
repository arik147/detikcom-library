@extends('layouts.app', ['activePage' => 'biblio', 'titlePage' => __('')])
@section('content') 
  <div class="container pt-4 bg-white">
    <div class="row">
      <div class="col-md-8 col-xl-6">
        <h1>Insert Bibliografi</h1>
        <hr>
   
        <form action="{{ route('bibliografis.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="judul">Judul Bilbiografi</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
              class="form-control @error('judul') is-invalid @enderror">
            @error('judul')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
   
          <div class="mb-3">
            <label class="form-label" for="edisi">Edisi Bibliografi</label>
            <input type="text" id="edisi" name="edisi" value="{{ old('edisi') }}"
              class="form-control @error('edisi') is-invalid @enderror">
            @error('edisi')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="penulis">Penulis Bibliografi</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}"
              class="form-control @error('penulis') is-invalid @enderror">
            @error('penulis')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}"
              class="form-control @error('penerbit') is-invalid @enderror">
            @error('penerbit')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="date" id="tahun" name="tahun" value="{{ old('tahun') }}"
              class="form-control @error('tahun') is-invalid @enderror">
            @error('tahun')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          <div class="mb-3">
            <label class="form-label" for="kategori">Kategori</label>
            <select class="form-select" name="kategori" id="kategori"
              value="{{ old('kategori') }}">
              @foreach ($kategoris as $kategori)
              <option value="{{ $kategori->id }}">{{$kategori->nama_kategori}}</option>
              @endforeach
            </select>
            @error('kategori')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label" for="isbn">ISBN</label>
            <input type="number" id="isbn" name="isbn" value="{{ old('isbn') }}"
              class="form-control @error('isbn') is-invalid @enderror">
            @error('isbn')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="jumlah">Jumlah Halaman</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}"
              class="form-control @error('jumlah') is-invalid @enderror">
            @error('jumlah')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="sinopsis">Sinopsis</label>
            <textarea class="form-control" id="sinopsis" rows="3"
            name="sinopsis">{{ old('sinopsis') }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label" for="lokasi">Gambar</label>
            <input type="file" accept="image/*" id="gambar" name="gambar" value="{{ old('gambar') }}"
              class="form-control @error('gambar') is-invalid @enderror">
            @error('gambar')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="lokasi">Upload File</label>
            <input type="file" accept="application/pdf" id="file_buku" name="file_buku" value="{{ old('file_buku') }}"
              class="form-control @error('file_buku') is-invalid @enderror">
            @error('file_buku')
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