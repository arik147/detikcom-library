@extends('layouts.app', ['activePage' => 'biblio', 'titlePage' => __('')])
@section('content') 
  <div class="container">
    <div class="flex flex-wrap">
        <div class="w-64 mb-2">
            <div class="bg-grey-light p-12 rounded mt-4">
                <div class="shadow">
                  <img itemprop="image" alt="{{$bibliografis->judul}}"  src="{{ asset('img/' . $bibliografis->gambar) }}"border="0" alt="PostgreSQL : a comprehensive guide to building, programming, and administering PostgreSQL databases" style="width: 200px;"/>                </div>
            </div>
        </div>
        <div class="flex-1 p-0 px-md-4 mt-4">
          
            <blockquote class="blockquote">
                <h4 class="mb-3">{{$bibliografis->judul}}</h4>
                <footer class="blockquote-footer"><a href="?author=%22Douglas%2C+Korry%22&search=Search" title="Click to view others documents with this author">{{$bibliografis->penulis}}</a> </footer>
            </blockquote>
            <hr>
            <p class="text-grey-darker text-justify"> {{$bibliografis->sinopsis}}</p>
            <hr>

            <h5 class="mt-4 mb-1">Detail Information</h5>
            <dl class="row">
                <dt class="col-sm-3">Series Title</dt>
                <dd class="col-sm-9">
                    <div itemprop="alternativeHeadline"
                         property="alternativeHeadline">{{$bibliografis->judul}}</div>
                </dd>

                <dt class="col-sm-3">Publisher</dt>
                <dd class="col-sm-9">
                    <span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization"
                          itemscope>{{$bibliografis->penerbit}}</span>
                    
                </dd>
                <dt class="col-sm-3">Collation</dt>
                <dd class="col-sm-9">
                    <div itemprop="numberOfPages"
                         property="numberOfPages">{{$bibliografis->jumlah_halaman}} Hal.</div>
                </dd>
                <dt class="col-sm-3">ISBN/ISSN</dt>
                <dd class="col-sm-9">
                    <div itemprop="isbn" property="isbn">{{$bibliografis->isbn}}</div>
                </dd>
                
                <dt class="col-sm-3">Edition</dt>
                <dd class="col-sm-9">
                    <div itemprop="bookEdition" property="bookEdition">{{$bibliografis->edisi}}</div>
                </dd>
                <dt class="col-sm-3">Categori</dt>
                <dd class="col-sm-9">
                    <div itemprop="bookCategori" property="bookCategori">{{$bibliografis->kategori->nama_kategori}}</div>
                </dd>
                
            </dl>
            <h5 class="mt-4">Functions</h5><hr>
            <div class="pt-1 d-flex ">
              
            <div class="d-flex">
              <a href="{{ route('bibliografis.edit',['bibliografi' => $bibliografis->id]) }}" class="btn btn-outline-primary mb-2 mr-2">Edit Bibliografi</a></div>
              <form method="POST" action="{{ route('bibliografis.destroy',
                  ['bibliografi' => $bibliografis->id]) }}">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger mb-2">Delete Bibliografi</button>
                </form>
            <br>
            </div>
            </div>
            
            
    </div>
</div>
@endsection
{{-- @include('footer') --}}