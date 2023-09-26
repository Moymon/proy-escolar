<?php

namespace App\Http\Controllers\rolesypermisos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\modelosPruebaModulos\Modulo;
use App\Models\modelosPruebaModulos\CatalogoPermiso;

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
        $permisos = Permission::all();
        $modulos = Modulo::all();


        return view('administracion.roles_permisos.roles-index',compact('roles', 'permisos', 'modulos'));
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





    function getPermisosRelacionadosConNombre(Request $request){
        $request->validate([
            'nombre' => 'required|string'
        ]);
        $rol = Role::where('name', $request->nombre)->first();
    
        $permisosRolSeleccionado = $rol->permissions;
        $permisosOriginalesXRol = $rol->permissions;
        $permisosNoCoincidentes = $this->getPermisosNoCoincidentes($rol->permissions);
    
        $response = [
            'rol' => $rol,
            'permisosRolSeleccionado' => $permisosRolSeleccionado,
            'permisosOriginalesXRol' => $permisosOriginalesXRol,
            'permisos_no_coincidentes' => $permisosNoCoincidentes,
        ];
    
        return response()->json($response);
    }

    function getPermisosModuloConRol(Request $request){
        $request->validate([
            'modulo' => 'required|string'
        ]);

        $permisos_modulo = $this->getPermisosModulo($request->modulo);

        $response = [
            'permisos_modulo' => $permisos_modulo,
        ];
        
        return response()->json($response);
    }

    function guardarPermisos(Request $request){
        $request->validate([
            'rol' => 'required|string',
        ]);

        $rol = Role::where('name', $request->rol)->first();

        $permisosXRol_Asignados = $request->permisosXRol_Asignados;

        if (empty($permisosXRol_Asignados)) {
            $rol->syncPermissions([]);
        } else {
            $permisosIDs = array_column($permisosXRol_Asignados, 'id');
            $rol->syncPermissions($permisosIDs);
        }

        $permisosRol = $rol->permissions;
        $permisosOriginalesXRol = $rol->permissions;
        $permisosNoCoincidentes = $this->getPermisosNoCoincidentes($rol->permissions);
    
        $response = [
            'permisosRol' => $permisosRol,
            'permisosOriginalesXRol' => $permisosOriginalesXRol,
            'permisos_no_coincidentes' => $permisosNoCoincidentes,

            'message' => 'Permisos actualizados correctamente',
        ];
    
        return response()->json($response);
    }


    function getPermisosModulo($modulo_name){
        $modulo = Modulo::where('nombre', $modulo_name)->first();

        $permisos_modulo = DB::table('catalogo_permiso')
        ->join('permissions', 'catalogo_permiso.id_permiso', '=', 'permissions.id')
        ->where('catalogo_permiso.id_modulo_c', $modulo->id_modulo)
        ->select('catalogo_permiso.id_permiso', 'permissions.name', /* Otros campos de permisos */)
        ->get();

        return $permisos_modulo;
    }

    function getPermisosNoCoincidentes($permisosRol){
        $permisosCompletos = Permission::all();

        // Filtrar los permisos que no se encuentran en permisosRolSeleccionado
        $permisosNoCoincidentes = $permisosCompletos->filter(function ($permiso) use ($permisosRol) {
            return !$permisosRol->contains('name', $permiso->name);
        })->values()->all();

        return $permisosNoCoincidentes;
    }




    function getUsuariosXRol(Request $request){
        $rol = Role::where('name', $request->rol)->first();
        //$users = User::all();


        //$usersXRol = $rol->users;

        $response = [
            //'users' => $users,
            //'usersXRol' => $usersXRol,
            'message' => 'response',
        ];

        return response()->json($response);
    }

    function guardarUsuariosXRol(Request $request){
        $request->validate([
            'rol' => 'required|string',
            'listaDeUsuariosAdded' => 'required',
        ]);
        
        /*
        $rol = Role::where('name', $request->rol)->first();
        
        $usersToAssignRole = User::whereIn('nombre', $request->listaDeUsuariosAdded)->get();
        
        $usersToAssignRole->each(function ($user) use ($rol) {
            $user->syncRoles([$rol->name]);
        });
        
        $usersNotWithRole = User::whereNotIn('nombre', $request->listaDeUsuariosAdded)->get();
        $usersNotWithRole->each(function ($user) use ($rol) {
            $user->removeRole($rol->name);
        });
        */
        
        $response = [
            'message' => 'Asignacion correcta',
        ];
    
        return response()->json($response);
    }
}
