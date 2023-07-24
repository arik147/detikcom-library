<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			
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
                        
                    </tr>
                    @empty
                    <td colspan="13" class="text-center">Tidak ada data...</td>
                    @endforelse
				</tbody>
			</table>
	</div>  
</div>      
    
</body>
</html>
