<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_update_a_user(): void
    {
        Permission::create(['name' => 'editar-rol']);
        $request = [
            'name' => 'Adolfo',
        ];

        $rol = Role::create(['name' => 'Adolfo']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('editar-rol');

        $response = $this->actingAs($user)->patch(route('roles.update', $rol->id), $request);
        $response->assertRedirect();

        $role = $rol->refresh();
        $this->assertEquals($request['name'], $rol->name);
    }
}
