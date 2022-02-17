<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class RolEditFunctionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_edit_a_rol(): void
    {
        Permission::create(['name' => 'editar-rol']);
        $rol = Role::create(['name' => 'reader']);
        $permission = Permission::create(['name' => 'edit posts']);
        $rol->givePermissionTo($permission);
        $permission->assignRole($rol);

        $user = User::factory()->create()->givePermissionTo('editar-rol');

        $response = $this->actingAs($user)->get("/roles/{$rol->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('roles.edit');
        $response->assertViewHas('role');
    }
}
