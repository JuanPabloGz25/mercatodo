<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class RolCreateFunctionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanAccessToTheRouteToCreateRol(): void
    {
        Permission::create(['name' => 'crear-roles']);
        $user = User::factory()->create()->givePermissionTo('crear-roles');
        $response = $this->actingAs($user)->get(route('roles.create'));
        $response->assertStatus(200);
    }
}
