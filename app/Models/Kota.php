<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = ['nama'];
    protected $appends = ['provinsi_nama'];

	public function provinsi()
	{
		return $this->belongsTo('App\Models\Provinsi');
	}
	public function getProvinsiNamaAttribute(){
	$provinsi = $this->provinsi;
	
	if(is_object($provinsi))
	{
	return $provinsi->nama;
	}else{
	return '-';
	}
	}
}