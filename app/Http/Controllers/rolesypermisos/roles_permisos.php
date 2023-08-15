<?php

namespace App\Http\Controllers\rolesypermisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\modulos;
use App\Models\catalogo_permiso;
use DB;

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
        $modulos  = modulos::all();

        $modulos_permisos = DB::table('catalogo_permiso')->join('permissions', 'catalogo_permiso.id_permiso','=','permissions.id')->join('modulo_catalogo','catalogo_permiso.id_modulo_c','=','modulo_catalogo.id_modulo')->select('permissions.id','permissions.name','modulo_catalogo.nombre','catalogo_permiso.descripcion')->get();
        
        var_dump($modulos_permisos);
        
        return view('administracion.roles_permisos.permisos-index',compact('permisos','modulos','modulos_permisos'));
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
        $catalogo = new catalogo_permiso();

        Permission::create(['name'=>$request->nombre_permiso]);

        $permiso = DB::table('permissions')->latest('id')->first();

        DB::insert('insert into ' . $catalogo->getTable() . '(id_permiso,id_modulo_c, descripcion) values (?,?,?) ' , [$permiso->id,$request->id_modulo, $request->descripcion] );

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
