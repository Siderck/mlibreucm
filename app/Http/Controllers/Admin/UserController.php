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

    public function update($rut, Request $request)
    {
        //dd('HOLA MUNDOO');
        // Get current user
        $user = users::findOrFail($rut);
        $data = ['u' => $u];

        $user = DB::table('users')->select('*')->where('rut', '=', $rut)->get();
        dd($user);
        // Validate the data submitted by user
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,Correo'
        ]);

        // if fails redirects back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Fill user model
        DB::table('users')->select('*')->where('rut', '=', $rut)->update(['nombres'=>$user->Nombres,'correo'=>$user->Correo]);

        // Save user to database
        $user->save();

        // Redirect to route
        return redirect()->route('admin/users');
    }

    public function Delete($rut){
        $users = users::orderBy('rut','Desc')->get();
        $data = ['users' => $users];
        //dd('hola');
        DB::table('users')->where('rut','=', $rut)->delete();
        //return view('admin.users.home', $data);
        return Redirect::back()->with('message','Usuario eliminado con éxito');
    }



}


