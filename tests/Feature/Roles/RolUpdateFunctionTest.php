<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolUpdateFunctionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanUpdateUser(): void
    {
        Permission::create(['name' => 'editar-roles']);
        $request = [
            'name' => 'Omar',
        ];

        $rol = Role::create(['name' => 'Omar']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('editar-roles');

        $response = $this->actingAs($user)->patch(route('roles.update', $rol->id), $request);
        $response->assertRedirect();

        $role = $rol->refresh();
        $this->assertEquals($request['name'], $rol->name);
    }
}
