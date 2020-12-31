<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
            'email' => 'required|email|unique:App\usuarios,Correo ',
            'telefono' => 'required',
            'direccion' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator -> fails()):
            return back()->withErrors($validator) ->with('message','Se ha producido un error','typealert','danger');
        else:
        endif;
    }
}
