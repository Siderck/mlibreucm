<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
class UserController extends Controller
{
    public function __Construct(){
        //ELIMINAR COMENTARIOS DESPUES
    //$this->middleware('auth');
    //$this->middleware('isadmin');
    }

    public function getUsers(){
        $users = users::orderBy('rut','Desc')->get();
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

}

