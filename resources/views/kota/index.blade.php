@extends('_layout.default')
@section('content')
<a href="{{url('kota/create')}}">Tambah</a>
<a href="{{url('/')}}">Kembali	</a>
<h1>Kota</h1>
<table>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Provinsi</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($kota as $item)
		<tr>
			<td>{{ $item->nama}}</td>
			<td>{{$item->provinsi_nama}}</td>
			<td>
				<a href="{{ url('kota', ['edit', $item->id]) }}" class="btn btn-default btn-sm">Edit</a>
				<a href="{{ url('kota', ['delete', $item->id]) }}" onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection