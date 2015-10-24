@extends('_layout.default')
@section('content')
<a href="{{url('provinsi/create')}}">Tambah</a>
<a href="{{url('/')}}">Kembali	</a>
<h1>Provinsi</h1>
<table>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($provinsi as $item)
		<tr>
			<td>{{ $item->nama}}</td>
			<td>
				<a href="{{ url('provinsi', ['edit', $item->id]) }}" class="btn btn-default btn-sm">Edit</a>
				<a href="{{ url('provinsi', ['delete', $item->id]) }}" onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection