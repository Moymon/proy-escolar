<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*Primero crear Roles*/
        //$rol_Admin =  Role::create(['name'=>'Administrador']);
        //$rol_Ventillas = Role::create(['name'=>'Ventanillas']);
        //Role::where('name', $request->rol)->first();
        $rol_Admin =  Role::where('name', 'Administrador')->first();
        $rol_Ventillas = Role::where('name', 'Ventanillas')->first();
        
        User::where('nombre', 'Super Usuario')->first()->syncRoles(['Administrador']);

        /*Segundo crear permisos*/
        //Permission::where('name', 'administrador')->first()->syncRoles([$rol_Admin]);
        //Permission::where('name', 'capturista')->first()->syncRoles([$rol_Ventillas]);
        
        /*Segundo crear permisos*/
        //Permission::where('name', 'administrador.update')->first()->syncRoles([$rol_Admin]);
        //Permission::where('name', 'administrador.edit')->first()->syncRoles([$rol_Admin]);
        //Permission::where('name', 'administrador.create')->first()->syncRoles([$rol_Admin]);
        //Permission::where('name', 'administrador.read')->first()->syncRoles([$rol_Admin]);
    }
}
