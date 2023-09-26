<?php

namespace App\Http\Controllers\modelosPruebaCapExReg;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class CreacionDeUsuarios extends Controller
{
    use RegistersUsers;

    public function createUsers(Request $request){
        //dd($request);
        $request->validate([
            'rpe' => ['required', 'string', 'max:10', 'unique:'.User::class],
            'nombre' => ['required', 'string', 'max:30'],
            'apellido_pa' => ['required', 'string', 'max:30'],
            'apellido_ma' => ['required', 'string', 'max:30'],
        ]);

        $user = User::create([
            'rpe' => $request->rpe,
            'nombre' => $request->nombre,
            'apellido_pa' => $request->apellido_pa,
            'apellido_ma' => $request->apellido_ma,
        ])->assignRole($request->rol);

        return redirect()->back();

    }
}
