<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomEmail;

class UserCustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("User.index")->with(['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function create()
    {
        return view("User.create");
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

            "name"=>"required",
            "email"=>"required",
            "tipo"=>"required",
        ]);
        
        $aux= $request->get("name")."123";
        
        $user = new User([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "tipo" => $request->get("tipo"),
            "password" => Hash::make($aux),
        ]);
        
        $user->save();
        
        $user->password=$aux;
        
    $user->sendEmailVerificationNotification();
        $destinatario = $request->input('email');
$correo = new \App\Mail\CustomEmail;
\Mail::to($destinatario)->send($correo);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);   
        return view("User.edit")->with(['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'tipo' => 'required'
        ]);
        $user = User::find($id);
        // echo $id;
        $user->tipo = $request['tipo'];
        $user->name = $request['name'];
        $user->save();
        return view("usuarios")->with(['usuarios' => User::all()]);
    }

    public function destroy($id)
    {
        $user = User::find( $id );
        $user->delete();
         $user = User::find($id);
                return view("usuarios")->with(['usuarios' => User::all()]);

    }
}
