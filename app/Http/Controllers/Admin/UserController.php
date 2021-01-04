<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
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

    public function Delete($rut){
        $users = users::orderBy('rut','Desc')->get();
        $data = ['users' => $users];
        DB::table('users')->where('rut', $rut)->delete();
        return view('admin.users.home', $data);
    }



}


