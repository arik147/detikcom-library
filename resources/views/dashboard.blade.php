@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">book</i>
              </div>
              <p class="card-category">Total Bibliografi</p>
              <h3 class="card-title">{{$bibliografis->count()}}
                <small>Buku</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">add</i>
                <a href="{{route("bibliografis.create")}}">Tambah Biblio</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Total Kategori</p>
              <h3 class="card-title"> {{$kategoris->count()}}<small> Kategori</small></h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">add</i> <a href="{{route("kategoris.create")}}">Tambah Kategori</a>
              </div>
            </div>
          </div>
        </div>

  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush