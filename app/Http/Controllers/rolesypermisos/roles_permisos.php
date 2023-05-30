<?php

namespace App\Http\Controllers\rolesypermisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roles_permisos extends Controller
{
    /*R = rol 
      P = permiso
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_r()
    {
        //

        $roles = Role::all();

        return view('administracion.roles_permisos.roles-index',compact('roles'));
    }

    public function index_p()
    {
        //
        $permisos = Permission::all();

        return view('administracion.roles_permisos.permisos-index',compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_r(Request $request)
    {
        //
        Role::create(['name'=>$request->nombre_rol]);
        return redirect('/roles');
    }

    public function create_p(Request $request)
    {
        //
        Permission::create(['name'=>$request->nombre_permiso]);
        return redirect('/permisos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rol = Role::find($id);
        $permisos = Permission::all();

        //var_dump($rol->permissions->count());
        
        return view('administracion.roles_permisos.roles-edit',compact('rol','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*
        var_dump($request->permisos);
        var_dump($id);*/

        $rol = Role::find($id);

        $rol->syncPermissions($request->permisos);

        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
