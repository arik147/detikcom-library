@extends('layouts.app', ['activePage' => 'biblio', 'titlePage' => __('')])
@section('content') 
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Bibliografi</b></h2>
					</div>
					<div class="col-sm-8">
						<a href="{{route("bibliografis.create")}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Bibliografi</span></a>						
            <a class="btn btn-primary" href="{{ route('exportPDF') }}">Export to PDF</a>
            <form action="{{ route('bibliografis.filter') }}" method="POST" enctype="multipart/form-data">
            @csrf
          
              <div class="mb-3">
                <label class="form-label" for="kategori">Filter by</label>
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

              <button type="submit" class="btn btn-primary mb-2">Filter</button>
              @if($status == true)
              <a href="{{route("bibliografis.index")}}" class="btn btn-danger"><span>Hapus Filter</span></a>
              @endif

            </form>

          </div>
				</div>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="text-center">Nomor</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Edisi</th>
            <th class="text-center">Penulis</th>
            <th class="text-center">Penerbit</th>
            <th class="text-center">Tahun</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
            @forelse ($bibliografis as $bibliografi)
            <tr>
                <th class="text-center">{{$loop->iteration}}</th>
                
                <td class="text-center"><a href="{{ route('bibliografis.show',['bibliografi' => $bibliografi->id]) }}" style="text-decoration: none;">{{$bibliografi->judul}}</a></td>
                
                <td class="text-center">{{$bibliografi->edisi}}</td>
                <td class="text-center">{{$bibliografi->penulis}}</td>
                <td class="text-center">{{$bibliografi->penerbit}}</td>
                <td class="text-center">{{$bibliografi->tahun}}</td>
                <td class="text-center">{{$bibliografi->kategori->nama_kategori}}</td>
                <td>
                  <a href="{{route('bibliografis.edit', ['bibliografi' => $bibliografi->id])}}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                  <form method="POST" action="{{ route('bibliografis.destroy',
                  ['bibliografi' => $bibliografi->id]) }}">
                  @method('DELETE')
                  @csrf
                  
                  <button type="submit" class="delete border-0" style="background-color:transparent; "><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                </form>
                  {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                </td>
              </tr>
            @empty
            <td colspan="13" class="text-center">Tidak ada data...</td>
            @endforelse
           
				</tbody>
			</table>
	</div>  
</div>      
@endsection
{{-- @include('footer') --}}
