<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermission extends Seeder
{
    public function run()
    {
        $permisos = [
            'ver-roles',
            'crear-roles',
            'editar-roles',
            'borrar-roles',

            'ver-productos',
            'crear-productos',
            'editar-productos',
            'borrar-productos',

            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',

            'ver-noticias',
            'crear-noticias',
            'editar-noticias',
            'borrar-noticias',

            'ver-historial',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
