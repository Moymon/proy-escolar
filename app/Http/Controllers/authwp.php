<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class authwp extends Controller
{
    //
    public function login_without_password(Request $request){
        $usuario = User::where('rpe',$request->rpe)->first();

        Auth::login($usuario);

        return view('dashboard');
    }
}
