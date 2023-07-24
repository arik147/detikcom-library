@extends('layouts.app', ['activePage' => 'kategori', 'titlePage' => __('')])
@section('content') 
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Kategori</b></h2>
					</div>
					<div class="col-sm-8">
						<a href="{{route("kategoris.create")}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Kategori</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
          <th class="text-center">Nomor</th>
						<th class="text-center">Nama Kategori</th>
            <th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
            @forelse ($kategoris as $kategori)
            <tr>
                <th class="text-center">{{$loop->iteration}}</th>
                
                
                <td class="text-center">{{$kategori->nama_kategori}}</td>
                <td>
                  <a href="{{route('kategoris.edit', ['kategori' => $kategori->id])}}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                  <form method="POST" action="{{ route('kategoris.destroy',
                  ['kategori' => $kategori->id]) }}">
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
