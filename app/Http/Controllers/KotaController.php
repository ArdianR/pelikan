<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kota;
use App\Models\Provinsi;

class KotaController extends Controller
{
    function __construct(Kota $kota,Provinsi $provinsi,Request $request)
    {
        $this->request = $request;
        $this->session = $request->session();
        $this->kota = $kota;
        $this->provinsi = $provinsi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $kota = $this->kota->paginate(20);
        return view('kota.index',compact('kota'));
    }
     public function getCreate()
    {
        return $this->form();
    }

    public function form($id=null)
    {
        if(!is_null($id))
        {
            $kota = $this->kota->findOrFail($id);
            $this->session->flashInput($kota->toArray());
        }

        $provinsi = Provinsi::lists('nama','id');
        return view('kota.form',compact('provinsi'));
    
    }
    public function postCreate()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        if($id){
            $kota = Kota::find($id);

        }
        else{
            $kota = new Kota;
        }

        $rule = [
            'nama'     => 'required',
            'provinsi_id' =>'required',
        ];

        $this->validate($this->request, $rule);

        $input = $this->request->only('nama','provinsi_id');     
        $kota->nama  = $input['nama'];
        $kota->provinsi_id  = $input['provinsi_id'];
        $kota->save();

        return redirect('kota');

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
        $kota = $this->kota->findOrFail($id);
        $kota->delete();
        return redirect('kota');
    }


}