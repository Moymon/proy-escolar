<?php

namespace App\Http\Controllers\modelosPruebaCapExReg;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\modelosPruebaModulos\Modulo;

class PermisosYRoles extends Controller
{

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
}
