<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_access_to_the_route_to_create_rol(): void
    {
        Permission::create(['name' => 'crear-rol']);
        $user = User::factory()->create()->givePermissionTo('crear-rol');
        $response = $this->actingAs($user)->get(route('roles.create'));
        $response->assertStatus(200);
    }
}
