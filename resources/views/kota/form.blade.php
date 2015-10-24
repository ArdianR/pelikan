@extends('_layout.default')
@section('content')
{!!Form::open()!!}
{!!Form::label('nama','Nama')!!}
{!!Form::text('nama',old('nama'))!!}
<br>
<br>
{!!Form::label('provinsi','Provinsi')!!}
{!!Form::select('provinsi_id', 	$provinsi, old('provinsi_id'))!!}
<br>
<br>
<button type="submit">Simpan</button>
{!!Form::close()!!}
@endsection