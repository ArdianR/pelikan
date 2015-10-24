@extends('_layout.default')
@section('content')
<a href="{{url('/kecamatan')}}">Kembali	</a>
{!!Form::open()!!}
{!!Form::label('nama','Nama')!!}
{!!Form::text('nama',old('nama'))!!}
<br>
<br>
{!!Form::label('kota','Kota')!!}
{!!Form::select('kota_id', 	$kota, old('provinsi_id'))!!}
<br>
<br>
<button type="submit">Simpan</button>
{!!Form::close()!!}
@endsection