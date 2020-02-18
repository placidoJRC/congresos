<?php

namespace App\Http\Controllers;
use App\PonenciaC;
use App\PagoC;

use Illuminate\Http\Request;
use App\User;
class ponencia extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ponencias= PonenciaC::all();
        $pagos= PagoC::all();

       return view('verponencias')->with(['ponencias'=>$ponencias,'pagos'=>$pagos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios= User::all();
        return view('crearponencia')->with(['usuarios'=>$usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate( $request, [
            "iduser"=>"required",
            "titulo"=>"required",
            "video"=>"required"
        ]);
        
        $ponencia = new PonenciaC([
            "iduser" => $request->get("iduser"),
            "titulo" => $request->get("titulo"),
            "video" => $request->get("video")
        ]);
        
        $ponencia->save();
        
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ponencia = PonenciaC::find($id);
        

        return view('verponencia')->with(['ponencia'=>$ponencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
