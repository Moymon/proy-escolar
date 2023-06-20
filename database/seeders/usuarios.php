<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$rol_Admin = Role::findByName('administrador');
        $permiso = Permission::findByName('administrador');
        
        $user1 = User::create([
            'nombre' => 'Super Usuario',
            'rpe' => '0',
            'apellido_pa' => ' ',
            'apellido_ma' => ' ',
        ])->assignRole('Administrador');

        User::create([
            'nombre' => 'Ventanilla 1',
            'rpe' => '1',
            'apellido_pa' => ' ',
            'apellido_ma' => ' ',
        ])->assignRole('Ventanillas');
            
        //$user1->syncPermissions([$permiso]);

    }
}
