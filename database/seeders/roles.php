<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $rol_Admin =  Role::create(['name'=>'Administrador']);
        $rol_Ventillas = Role::create(['name'=>'Ventanillas']);
        

        /*Segundo crear permisos*/
        Permission::create(['name'=>'administrador'])->syncRoles([$rol_Admin]);
        Permission::create(['name'=>'capturista'])->syncRoles([$rol_Ventillas]);
        
        /*Segundo crear permisos*/
        Permission::create(['name'=>'administrador.update'])->syncRoles([$rol_Admin]);
        Permission::create(['name'=>'administrador.edit'])->syncRoles([$rol_Admin]);
        Permission::create(['name'=>'administrador.create'])->syncRoles([$rol_Admin]);
        Permission::create(['name'=>'administrador.read'])->syncRoles([$rol_Admin]);
    }
}
