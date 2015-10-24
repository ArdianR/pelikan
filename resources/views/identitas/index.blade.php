@extends('_layout.default')
@section('content')
<a href="{{url('identitas/create')}}">Tambah</a>
<a href="{{url('/')}}">Kembali</a>
<h1>Identitas</h1>
<table>
	<thead>
		<tr>
			<th>nomorakte</th>
			<th>Nama</th>
			<th>tempatlahir</th>
			<th>tanggallahir</th>
			<th>alamat</th>
			<th>provinsi_id</th>
			<th>kota_id</th>
			<th>kecamatan_id</th>
			<th>hobi</th>
			<th>cita</th>
			<th>sekolah</th>
			<th>alasan</th>
			<th>ayah</th>
			<th>ibu</th>
			<th>drugs</th>
			<th>rokok</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($identitas as $item)
		<tr>
		<td>{{$item->nomorakte}}</td>
			<td>{{ $item->nama}}</td>
			<td>{{$item->tempatlahir}}</td>
			<td>{{$item->tanggallahir}}</td>
			<td>{{$item->alamat}}</td>
			<td>{{$item->provinsi_nama}}</td>
			<td>{{$item->kota_nama}}</td>
			<td>{{$item->kecamatan_nama}}</td>
			<td>{{$item->hobi_nama}}</td>
			<td>{{$item->cita}}</td>
			<td>{{$item->sekolah_label}}</td>
			<td>{{$item->alasan}}</td>
			<td>{{$item-> ayah_label }}</td>
			<td>{{$item->ibu_label}}</td>
			<td>{{$item->drugs_label}}</td>
			<td>{{$item->rokok_label}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection