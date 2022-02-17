<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermission extends Seeder
{
    public function run()
    {
        $permisos = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            'ver-product',
            'crear-product',
            'editar-product',
            'borrar-product',

            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}