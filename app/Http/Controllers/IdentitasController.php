<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Identitas;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Hobi;


class IdentitasController extends Controller
{
    function __construct(Hobi $hobi, Kecamatan $kecamatan, Kota $kota, Provinsi $provinsi, Identitas $identitas, Request $request)
    {
        $this->identitas = $identitas;
        $this->request = $request;
        $this->session = $request->session();
        $this->provinsi = $provinsi;
        $this->kota = $kota;
        $this->hobi = $hobi;
        $this->kecamatan = $kecamatan;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $identitas = $this->identitas->paginate(20);
        return view('identitas.index',compact('identitas'));
    }
    public function getCreate()
    {
       return $this->form();
    }

    public function form($id=null)
    {
        if(!is_null($id))
        {
            $identitas = $this->identitas->findOrFail($id);
            $this->session->flashInput($identitas->toArray());
        }

        $provinsi = Provinsi::lists('nama','id');
        $kecamatan = Kecamatan::lists('nama','id');
        $hobi = Hobi::lists('jenis','id');
        $kota = Kota::lists('nama','id');  
        return view('identitas.form',compact('kota','provinsi','kecamatan','hobi'));
    
    }
     public function postCreate()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        if($id){
            $identitas = Identitas::find($id);

        }
        else{
            $identitas = new Identitas;
        }

        $rule = [
            'nomorakte' =>'required',
            'nama'     => 'required',
            'tempatlahir'=> 'required',
            'tanggallahir'=> 'required',
            'alamat'=> 'required',
            'provinsi_id'=> 'required',
            
            'kota_id' =>'required',
            'kecamatan_id'=> 'required',
            'hobi_id'=> 'required',
            'cita'=> 'required',
            'sekolah'=> 'required',
            'alasan'=> 'required',
            'ayah'=> 'required',
            'ibu'=> 'required',
            'drugs'=> 'required',
            'rokok'=> 'required',
        ];

        $this->validate($this->request, $rule);

        $input = $this->request->only('nomorakte','nama','tempatlahir','tanggallahir','alamat','provinsi_id','kota_id','kecamatan_id','hobi_id', 'cita','sekolah','alasan','ayah','ibu','drugs','rokok');     
        $identitas->nomorakte = $input['nomorakte'];
        $identitas->nama  = $input['nama'];
        $identitas->tempatlahir = $input['tempatlahir'];
        $identitas->tanggallahir = $input['tanggallahir'];
        $identitas->alamat = $input['alamat'];
        $identitas->provinsi_id = $input['provinsi_id'];
        $identitas->kota_id  = $input['kota_id'];
        $identitas->kecamatan_id = $input['kecamatan_id'];
        $identitas->hobi_id = $input['hobi_id'];
        $identitas->cita = $input['cita'];
        $identitas->sekolah = $input['sekolah'];
        $identitas->alasan = $input['alasan'];
        $identitas->ayah = $input['ayah'];
        $identitas->ibu = $input['ibu'];      
        $identitas->drugs = $input['drugs'];    
        $identitas->rokok = $input['rokok'];    
        $identitas->save();

        return redirect('identitas');

    }
    public function getEdit($id)
    {
        return $this->form($id);
    }

    public function postEdit($id)
    {
        return $this->save($id);
    }

    public function getDelete($id)
    {
        $identitas = $this->identitas->findOrFail($id);
        $identitas->delete();
        return redirect('identitas');
    }


}