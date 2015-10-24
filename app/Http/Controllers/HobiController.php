<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Hobi;

class HobiController extends Controller
{
    function __construct(Hobi $hobi, Request $request)
    {
        $this->request = $request;
        $this->session = $request->session();
        $this->hobi = $hobi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $hobi = $this->hobi->paginate(20);
        return view('hobi.index',compact('hobi'));
    }
      public function getCreate()
    {
        return $this->form();
    }

    public function form($id=null)
    {
        if(!is_null($id))
        {
            $hobi = $this->hobi->findOrFail($id);
            $this->session->flashInput($hobi->toArray());
        }
        return view('hobi.form');
    }
    public function postCreate()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        if($id){
            $hobi = Hobi::find($id);

        }
        else{
            $hobi = new Hobi;
        }

        $rule = [
            'jenis'     => 'required',
        ];

        $this->validate($this->request, $rule);

        $input = $this->request->only('jenis');     
        $hobi->jenis  = $input['jenis'];
        $hobi->save();

        return redirect('hobi');

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
        $hobi = $this->hobi->findOrFail($id);
        $hobi->delete();
        return redirect('hobi');
    }
}