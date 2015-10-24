<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kota;
class KecamatanController extends Controller
{
    function __construct(Kecamatan $kecamatan, Kota $kota,Request $request)
    {
        $this->request = $request;
        $this->session = $request->session();
        $this->kota = $kota;
        $this->kecamatan = $kecamatan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $kecamatan = $this->kecamatan->paginate(20);
        return view('kecamatan.index',compact('kecamatan'));
    }
      public function getCreate()
    {
        return $this->form();
    }

    public function form($id=null)
    {
        if(!is_null($id))
        {
            $kecamatan = $this->kecamatan->findOrFail($id);
            $this->session->flashInput($kecamatan->toArray());
        }
        $kota = Kota::lists('nama','id');  
        return view('kecamatan.form',compact('kota'));
    
    }
    public function postCreate()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        if($id){
            $kecamatan = Kecamatan::find($id);

        }
        else{
            $kecamatan = new Kecamatan;
        }

        $rule = [
            'nama'     => 'required',
            'kota_id' =>'required',
        ];

        $this->validate($this->request, $rule);

        $input = $this->request->only('nama','kota_id');     
        $kecamatan->nama  = $input['nama'];
        $kecamatan->kota_id  = $input['kota_id'];
        $kecamatan->save();

        return redirect('kecamatan');

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