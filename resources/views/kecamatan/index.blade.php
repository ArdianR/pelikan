@extends('_layout.default')
@section('content')
<a href="{{url('kecamatan/create')}}">Tambah</a>
<a href="{{url('/')}}">Kembali	</a>
<h1>Kecamatan</h1>
<table>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Kota</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($kecamatan as $item)
		<tr>
			<td>{{ $item->nama}}</td>
			<td>{{$item->kota_nama}}</td>
			<td>
				<a href="{{ url('kecamatan', ['edit', $item->id]) }}" class="btn btn-default btn-sm">Edit</a>
				<a href="{{ url('kecamatan', ['delete', $item->id]) }}" onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection