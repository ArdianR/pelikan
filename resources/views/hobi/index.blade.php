@extends('_layout.default')
@section('content')
<a href="{{url('hobi/create')}}">Tambah</a>
<a href="{{url('/')}}">Kembali	</a>
<h1>Hobi</h1>
<table>
	<thead>
		<tr>
			<th>Jenis</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($hobi as $item)
		<tr>
			<td>{{ $item->jenis}}</td>
			<td>
				<a href="{{ url('hobi', ['edit', $item->id]) }}" class="btn btn-default btn-sm">Edit</a>
				<a href="{{ url('hobi', ['delete', $item->id]) }}" onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection