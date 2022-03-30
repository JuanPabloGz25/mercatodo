<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolDestroyFunctionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanDestroyRol(): void
    {
        Permission::create(['name' => 'borrar-roles']);
        $rol = Role::create(['name' => 'Omar']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('borrar-roles');

        $response = $this->actingAs($user)->delete("/roles/{$rol->id}");
        $response->assertRedirect();
    }
}
