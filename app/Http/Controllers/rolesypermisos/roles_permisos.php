<?php

namespace App\Http\Controllers\rolesypermisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\modulos;
use App\Models\catalogo_permiso;
use DB;
use App\Models\User;

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

        $modulos_permisos = DB::table('catalogo_permiso')->join('permissions', 'catalogo_permiso.id_permiso','=','permissions.id')->join('modulo_catalogo','catalogo_permiso.id_modulo_c','=','modulo_catalogo.id_modulo')->orderBy('modulo_catalogo.nombre','asc')->select('permissions.id','permissions.name','modulo_catalogo.nombre','catalogo_permiso.descripcion')->get();
        
        /*var_dump($modulos_permisos);*/
        
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

    public function getRolesNombre(Request $request){

        $roles = DB::table('model_has_roles')
                ->join('users','model_has_roles.model_id','=','users.id')
                ->join('roles','model_has_roles.role_id','=','roles.id')
                ->where('users.id',$request->rol)
                ->select('roles.id','roles.name')
                ->get();

        $rolesUserSeleccionado = $roles;
        $rolesOriginalesXUser = $roles;
        $rolesNoCoincidentes = $this->getRNoCoincidentes($roles);

        $rolesAll = Role::all();

        $response = [
            'roles' => $rolesAll,
            'rolesUserSeleccionado' => $rolesUserSeleccionado,
            'rolesOriginalesUser' => $rolesOriginalesXUser,
            'rolesNoCoincidentes' => $rolesNoCoincidentes,
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
        // Validar los datos de la solicitud
        $request->validate([
            'rol' => 'required|string',
            'permisosXRol_Asignados' => 'required',
        ]);

        $rol = Role::where('name', $request->rol)->first();

        // Decodificar el JSON a un objeto de PHP
        $permisosXRol_Asignados = $request->permisosXRol_Asignados;
        $permisosIDs = array_column($permisosXRol_Asignados, 'id');
        $rol->syncPermissions($permisosIDs);

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


    function guardarRoles(Request $request){
        // Validar los datos de la solicitud
        /*
        $request->validate([
            'rol' => 'required|string',
            'permisosXRol_Asignados' => 'required',
        ]);

        $rol = Role::where('name', $request->rol)->first();

        // Decodificar el JSON a un objeto de PHP
        $permisosXRol_Asignados = $request->permisosXRol_Asignados;
        $permisosIDs = array_column($permisosXRol_Asignados, 'id');
        $rol->syncPermissions($permisosIDs);

        $permisosRol = $rol->permissions;
        $permisosOriginalesXRol = $rol->permissions;
        $permisosNoCoincidentes = $this->getPermisosNoCoincidentes($rol->permissions);*/
    
        $user = User::find($request->rol);
        
        if($request->asignados > 0){
            $role_s = $request->asignados;
            $id_s = array_column($role_s,'id');

            $user->syncRoles($id_s);
        }else{
            $user->syncRoles([]);
        }


        
        $response = [
            /*
            'permisosRol' => $permisosRol,
            'permisosOriginalesXRol' => $permisosOriginalesXRol,
            'permisos_no_coincidentes' => $permisosNoCoincidentes,*/
            'data' => $request->rol,
            'user' => $user,
            'asignados' => $request->asignados,
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

    function getRNoCoincidentes($roles){
        $rolesCompletos = Role::all();

        /*Filtrar los roles que no se encuentren en los seleccionados*/
        $rolesNoCoincidentes = $rolesCompletos->filter(function ($rol)
            use ($roles) {
                return !$roles->contains('name',$rol->name);
            })->values()->all();
        return $rolesNoCoincidentes;
    }
}
