<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_destroy_rol(): void
    {
        Permission::create(['name' => 'borrar-rol']);
        $rol = Role::create(['name' => 'adolfo']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('borrar-rol');

        $response = $this->actingAs($user)->delete("/roles/{$rol->id}");
        $response->assertRedirect();
    }
}
