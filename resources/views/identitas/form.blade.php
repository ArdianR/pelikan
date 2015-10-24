@extends('_layout.default')
@section('content')
<a href="{{url('/identitas')}}">Kembali</a>

{!! Form::open() !!}
{!!Form::label('nomorakte','Nomor Akte')!!}       
{!! Form::text('nomorakte', old('nomorakte')	) !!}
<br><br>
{!!Form::label('nama','Nama')!!}       
{!! Form::text('nama', old('nama')	) !!}
<br><br>
{!!Form::label('tempatlahir','tempatlahir')!!}
{!! Form::text('tempatlahir', old('tempatlahir')	) !!}
<br><br>
{!!Form::label('tanggallahir','tanggallahir')!!}
{!! Form::text('tanggallahir', old('tanggallahir')	) !!}
<br><br>
{!!Form::label('alamat','alamat')!!}
{!! Form::textarea('alamat', old('alamat'),['rows'=>'5']) !!}
<br><br>
{!!Form::label('provinsi_id','provinsi_id')!!}
{!!Form::select('provinsi_id',$provinsi,old('provinsi'))!!}

<br><br>
{!!Form::label('kota_id','kota_id')!!}
{!! Form::select('kota_id',$kota,old('nama')	) !!}
<br><br>
{!!Form::label('kecamatan_id','kecamatan_id')!!}
{!! Form::select('kecamatan_id',$kecamatan,old('kecamatan_id')	) !!}
<br><br>
{!!Form::label('hobi','hobi')!!}
{!! Form::select('hobi_id', $hobi, old('hobi_id')	) !!}
<br><br>
{!!Form::label('cita','cita')!!}
{!! Form::text('cita', old('cita')	) !!}
<br><br>
{!!Form::label('sekolah','sekolah')!!}
{!! Form::select('sekolah',['1'=>'Ya','0'=>'Tidak'], old('sekolah')	) !!}
<br><br>
{!!Form::label('alasan','alasan')!!}
{!! Form::textarea('alasan', old('alasan'),['rows'=>'5']	) !!}
<br><br>
{!!Form::label('ayah','ayah')!!}
{!! Form::select('ayah',['1'=>'Ada','0'=>'Tidak Ada'],old('ayah')	) !!}
<br><br>
{!!Form::label('ibu','ibu')!!}
{!! Form::select('ibu',['1'=>'Ada','0'=>'Tidak Ada'], old('ibu')	) !!}
<br><br>
{!!Form::label('drugs','drugs')!!}
{!! Form::select('drugs',['1'=>'Memakai','0'=>'Tidak'],old('drugs')	) !!}
<br><br>
{!!Form::label('rokok','rokok')!!}
{!! Form::select('rokok',['1'=>'Merokok','0'=>'Bukan Perokok'] ,old('rokok')	) !!}
<br>
<br>
<button type="submit">Simpan</button>

{!! Form::close() !!}
@endsection