<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\usuarios;

class ConnectController extends Controller
{
    public function getLogin(){
        return view('connect.login');
    }

    public function getRegister(){
        return view('connect.register');
    }

    public function postregister(Request $request){
        //Se define un arreglo con las reglas de validacion para registrarse
        $rules = [
            'name' => 'required',
            'rut' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:usuarios,Correo',
            'telefono' => 'required',
            'direccion' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8'
        ];

        $messages = [
            'name.required' => 'El campo Nombres es requerido',
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

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator -> fails()):
            return back()->withErrors($validator) ->with('message','Se ha producido un error','typealert','danger');
        else:
            $user = new usuarios;
            $user->Nombres = $request->input('name');
            $user->RUT = $request->input('rut');
            $user->Apellidos = $request->input('apellidos');
            $user->Correo = $request->input('email');
            $user->Telefono = $request->input('telefono');
            $user->Dirección = $request->input('direccion');
            $user->Contrasena = $request->input('password');
            $user->TipoUsuario = 2;

            if($user->save()):
                return redirect('/login')->with('message', 'El usuario se ha registrado con éxito')->with('typealert','success');
            endif;
        endif;
    }
}
