<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['nama'];
    protected $appends = ['kota_nama'];

    
public function kota()
	{
		return $this->belongsTo('App\Models\Kota');
	}
	public function getKotaNamaAttribute(){
	$kota = $this->kota;
	
	if(is_object($kota))
	{
	return $kota->nama;
	}else{
	return '-';
	}
	}

}
