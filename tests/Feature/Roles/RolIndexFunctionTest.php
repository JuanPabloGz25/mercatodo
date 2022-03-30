<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class RolIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanListRoles(): void
    {
        Permission::create(['name' => 'ver-roles']);
        $user = User::factory()->create()->givePermissionTo('ver-roles');
        $response = $this->actingAs($user)->get(route('roles.index'));
        $response->assertStatus(200);
        $response->assertViewIs('roles.index');
        $response->assertViewHas('roles');
    }
}
