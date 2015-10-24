@extends('_layout.default')
@section('content')
<a href="{{url('/kecamatan')}}">Kembali	</a>
{!!Form::open()!!}
{!!Form::label('jenis','Jenis')!!}
{!!Form::text('jenis',old('jenis'))!!}
<br>
<br>
<button type="submit">Simpan</button>
{!!Form::close()!!}
@endsection