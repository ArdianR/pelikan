<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{	
	protected $table = 'identitas';
	protected $fillable = ['nama', 'tempatlahir','tanggallahir','alamat','provinsi','kota','kecamatan','hobi','cita','sekolah','alasan','lat','lang','image','status'];
	protected $appends = ['provinsi_nama','kota_nama','kecamatan_nama','hobi'];

	public function provinsi()
	{
		return $this->belongsTo('App\Models\Provinsi');
	}
	public function kota()
	{
		return $this->belongsTo('App\Models\Kota');
	}
	public function kecamatan()
	{
		return $this->belongsTo('App\Models\Kecamatan');
	}
	public function hobi()
	{
		return $this->belongsTo('App\Models\Hobi');
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
	public function getKotaNamaAttribute(){
	$kota = $this->kota;
	
	if(is_object($kota))
	{
	return $kota->nama;
	}else{
	return '-';
	}
	}
	public function getKecamatanNamaAttribute(){
	$kecamatan = $this->kecamatan;
	
	if(is_object($kecamatan))
	{
	return $kecamatan->nama;
	}else{
	return '-';
	}
	}
	public function getHobiNamaAttribute(){
	$hobi = $this->hobi;
	
	if(is_object($hobi))
	{
	return $hobi->jenis;
	}else{
	return '-';
	}
	}
	public function getAyahLabelAttribute()
    {
        $template = '%s';

        switch($this->ayah){
            default:
                $ayah = 'Ada';
                break;
            case 0:
                $ayah = 'Tidak';
                break;
        }

        return sprintf($template, $ayah);
    }
    public function getIbuLabelAttribute()
    {
        $template = '%s';

        switch($this->ibu){
            default:
                $ibu = 'Ada';
                break;
            case 0:
                $ibu = 'Tidak';
                break;
        }

        return sprintf($template, $ibu);
    }
    public function getDrugsLabelAttribute()
    {
        $template = '%s';

        switch($this->drugs){
            default:
                $drugs = 'Pernah';
                break;
            case 0:
                $drugs = 'Tidak';
                break;
        }

        return sprintf($template, $drugs);
    }
    public function getRokokLabelAttribute()
    {
        $template = '%s';

        switch($this->rokok){
            default:
                $rokok = 'Merokok';
                break;
            case 0:
                $rokok = 'Tidak';
                break;
        }

        return sprintf($template, $rokok);
    }
    public function getSekolahLabelAttribute()
    {
        $template = '%s';

        switch($this->sekolah){
            default:
                $sekolah = 'Ya';
                break;
            case 0:
                $sekolah = 'Tidak';
                break;
        }

        return sprintf($template, $sekolah);
    }
}