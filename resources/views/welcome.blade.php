@extends('_layout.default')
@section('content')
<h1>Dashboard</h1>
<a href="{{url('/provinsi')}}">Provinsi</a>
<a href="{{url('/kota')}}">Kota</a>
<a href="{{url('/kecamatan')}}">Kecamatan</a>
<a href="{{url('/hobi')}}">Hobi</a>
<a href="{{url('/identitas')}}">Identitas</a>
<a href="{{url('auth/logout')}}">Logout</a>
@endsection