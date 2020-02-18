<?php

namespace App\Http\Controllers;
use App\PagoC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pago extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crearpago');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name="";
        if($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        $file = $request->file('imagen');
        $target = '../public/assets/img';
        $name = $file->getClientOriginalName();
        $file->move($target, $name);
        }
         $valores = array (
                        "verificado" => 0,
                        "iduser"=>Auth::user()->id,
                        "documento"=>$name,
                    );
        $pago= new PagoC($valores);//momento magico
        $pago->save();
        return view("index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
