<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth;
use App\users;
use DB;

class ConnectController extends Controller
{
    public function getLogin(){
        #Si el usuario ya está logeado redirigir a la pagina principal
        if($_SESSION['val']!=3){
            return redirect('/');
        }

        return view('connect.login');
    }

    public function getEdit(){
        #Si el usuario ya está logeado redirigir a la pagina principal
        if($_SESSION['val']==3){
            return redirect('/');
        }

        return view('connect.edit');
    }

    public function postEdit(Request $request){
        $rules = [
            'name' => 'required',
            'rut' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,Correo',
            'telefono' => 'required',
            'direccion' => 'required'
        ];

        $messages = [
            'name.required' => 'El campo name es requerido',
            'rut.required' => 'El campo RUT es requerido',
            'apellidos.required' => 'El campo Apellidos es requerido',
            'email.required' => 'El campo Correo es requerido',
            'telefono.required' => 'El campo Teléfono es requerido',
            'direccion.required' => 'El campo Dirección es requerido'
        ];

        $user= users::find($_SESSION['rut']);
        $user->nombres = $request->input('name');
        $user->rut = $request->input('rut');
        $user->apellidos = $request->input('apellidos');
        $user->correo = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->dirección = $request->input('direccion');
        $user->save();
        $_SESSION['rut'] = $request->input('rut');
        return back()->with('message','Los datos fueron modificados exitosamente','typealert','success');

    }

    public function postLogin(Request $request){
        $rules = [
            'rut' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'rut.required' => 'El campo Correo es requerido',
            'password.required' => 'El campo Contraseña es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator -> fails()):
            return back()->withErrors($validator) ->with('message','Se ha producido un error','typealert','danger');
        else:


            $rut = $request->input('rut');
            $password = $request->input('password');

            $users = DB::table('users')->select('contrasena')
                ->where('rut', '=', $rut)
                ->get();

            if($password == $users[0]->contrasena):
                $tipousuario = DB::table('users')->select('tipousuario')->where('rut', '=', $rut)->get();
                $_SESSION['val'] = $tipousuario[0]->tipousuario; #Cambia el tipo de sesion al tipo del usuario que realizó el login
                $_SESSION['rut'] = $rut;
                if($_SESSION['val'] == 0):
                    return redirect('/admin');
                else:
                    return redirect('/');
                endif;
            else:
                return back()->with('message','Los datos ingresados son erróneos','typealert','danger');
            endif;

        endif;
    }

    public function getRegister(){
        #Si el usuario ya está registrado redirigir a la pagina principal
        if($_SESSION['val']!=3){
            return redirect('/');
        }

        return view('connect.register');
    }

    public function getAdmin(){
        #Si el usuario no es admin redirigir a la pagina principal
        if($_SESSION['val']!=0){
            return redirect('/');
        }
        return view('admin.dashboard');
    }

    public function postregister(Request $request){
        //Se define un arreglo con las reglas de validacion para registrarse
        $rules = [
            'name' => 'required',
            'rut' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,Correo',
            'telefono' => 'required',
            'direccion' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8'
        ];

        $messages = [
            'name.required' => 'El campo name es requerido',
            'rut.required' => 'El campo RUT es requerido',
            'apellidos.required' => 'El campo Apellidos es requerido',
            'email.required' => 'El campo Correo es requerido',
            'telefono.required' => 'El campo Teléfono es requerido',
            'direccion.required' => 'El campo Dirección es requerido',
            'password.required' => 'El campo Contraseña es requerido',
            'password.min' => 'La contraseña debe tener al menos 8 carácteres',
            'cpassword.required' => 'El campo Confirmar Contraseña es requerido',
            'cpassword.same' => 'Las contraseñas no coinciden',
        ];

        $rut = $request->input('rut');
        
        if(DB::table('users')->where('rut', '=', $rut)->exists()):
            return back()->with('message','El rut ingresado ya posee una cuenta asociada','typealert','danger');
        else:
            $user = new users;
            $user->nombres = $request->input('name');
            $user->rut = $request->input('rut');
            $user->apellidos = $request->input('apellidos');
            $user->correo = $request->input('email');
            $user->telefono = $request->input('telefono');
            $user->dirección = $request->input('direccion');
            $user->contrasena = $request->input('password');
            $user->tipousuario = 2;

            if($user->save()):
                return redirect('/login')->with('message', 'El usuario se ha registrado con éxito')->with('typealert','success');
            endif;
        endif;
    }

    public function getLogout(){
        #Si el usuario es un visitante redirigir a la pagina principal
        if($_SESSION['val']==3){
            return redirect('/');
        }

        $_SESSION['val'] = "3";
        return redirect('/');
    }
}
