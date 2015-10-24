@extends('_layout.default')
@section('content')
{!!Form::open()!!}
{!!Form::label('nama','Nama')!!}
{!!Form::text('nama',old('nama'))!!}
<button type="submit">Simpan</button>
{!!Form::close()!!}
@endsection