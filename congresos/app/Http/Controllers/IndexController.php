<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PagoC;
use App\CongresoC;
use App\User;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $messages = [
            'logged' => 'Bienvenido',
            'passwordreset' => 'Clave de acceso reseteada',
            'registered' => 'Registrado, ver correo',
            'useredit' => 'Se ha editado el usuario y se le ha enviado un correo de verificación',
            'verified' => 'Usuario verificado, ya puedes iniciar sesión',
        ];
        $opSession = $request->session()->get('op');
        $alertMessage = null;
        if(isset($messages[$opSession])) {
            $alertMessage = $messages[$opSession];
        }
        if(Auth::user()!=null){
             $pagos= PagoC::all();
             return view('index')->with(['alertMessage' => "hola",'pagos'=>$pagos]);
        }
       
        return view('index')->with(['alertMessage' => "adios"]);
    }

    public function correo()
    {
        $destinatario = 'izvdaw0@gmail.com';
        $correo = new \App\Mail\CorreoInformativo();
        $correo->setSubject('Saludos');
        \Mail::to($destinatario)->send($correo);
    }

    function autentificado()
    {
        echo 'autentificado';
    }

    function guest()
    {
        echo 'guest';
    }

    function verificado()
    {
        echo 'verificado';
    }

    function basic(Request $request)
    {
        echo $request['tituloApp'];
        
    }

    function admin()
    {
        echo 'admin';
    }

    function censura(Request $request)
    {
        echo '3';
        $dato1 = $request['dato1'];
        $array = [
            'dato1' => $dato1,
            'dato3' => 'se-o'
        ];
        echo '4';
        return view('censura')->with($array);
    }
    function usuarios(){
        $usuarios=User::all();
        return view('usuarios')->with(['usuarios'=>$usuarios]);
    }
    
     function congresos(){
        $congresos=CongresoC::all();
        return view('vercongresos')->with(['congresos'=>$congresos]);
    }
    
       function pago(){
        $pagos=PagoC::all();
        $usuarios=User::all();
        return view('verpagos')->with(['pagos'=>$pagos,'usuarios'=>$usuarios]);
    }
    
      public function update(Request $request, $id)
    {
       
        $pago = PagoC::find($id);
        // echo $id;
              $usuarios=User::all();

        $pago->verificado = $request['verificar'];
        $pago->save();
        return view("verpagos")->with(['pagos' => PagoC::all(),'usuarios'=>$usuarios]);
    }
}