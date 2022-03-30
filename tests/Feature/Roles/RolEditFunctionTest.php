<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolEditFunctionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanEditRoles(): void
    {
        Permission::create(['name' => 'editar-roles']);
        $rol = Role::create(['name' => 'reader']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('editar-roles');

        $response = $this->actingAs($user)->get("/roles/{$rol->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('roles.edit');
        $response->assertViewHas('role');
    }
}
