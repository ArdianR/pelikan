<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Identitas;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    function __construct(Provinsi $provinsi, Request $request)
    {
        $this->request = $request;
        $this->session = $request->session();
        $this->provinsi = $provinsi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $provinsi = $this->provinsi->paginate(20);
        return view('provinsi.index',compact('provinsi'));
    }
     public function getCreate()
    {
        return $this->form();
    }

    public function form($id=null)
    {
        if(!is_null($id))
        {
            $provinsi = $this->provinsi->findOrFail($id);
            $this->session->flashInput($provinsi->toArray());
        }
        return view('provinsi.form');
    }
    public function postCreate()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        if($id){
            $provinsi = Provinsi::find($id);

        }
        else{
            $provinsi = new Provinsi;
        }

        $rule = [
            'nama'     => 'required',
        ];

        $this->validate($this->request, $rule);

        $input = $this->request->only('nama');     
        $provinsi->nama  = $input['nama'];
        $provinsi->save();

        return redirect('provinsi')->withMessage([
            'text' => 'Data Pasien telah disimpan',
            'type' => 'success'
        ]);

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
        $provinsi = $this->provinsi->findOrFail($id);
        $provinsi->delete();
        return redirect('provinsi');
    }


}