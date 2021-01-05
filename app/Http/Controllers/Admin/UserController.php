<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use Redirect;
use DB;
use Auth;
class UserController extends Controller
{


    public function getUsers(){
        $users = users::orderBy('rut','Desc')->get();
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUserEdit($rut, Request $request){
        $u = users::findOrFail($rut);
        $data = ['u' => $u];

        return view('admin.users.user_edit', $data);
    }

    public function postUserEdit($rut, Request $request){
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

        $user= users::find($rut);
        $user->nombres = $request->input('name');
        $user->rut = $request->input('rut');
        $user->apellidos = $request->input('apellidos');
        $user->correo = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->dirección = $request->input('direccion');
        $user->save();
        return back()->with('message','Los datos fueron modificados exitosamente','typealert','success');
    }

    public function Delete($rut){
        $users = users::orderBy('rut','Desc')->get();
        $data = ['users' => $users];
        DB::table('users')->where('rut', $rut)->delete();
        return Redirect::back()->with('message','Usuario eliminado con éxito');
    }



}


