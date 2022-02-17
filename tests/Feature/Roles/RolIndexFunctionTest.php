<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_list_a_rol(): void
    {
        Permission::create(['name' => 'ver-rol']);
        $user = User::factory()->create()->givePermissionTo('ver-rol');
        $response = $this->actingAs($user)->get(route('roles.index'));
        $response->assertStatus(200);
        $response->assertViewIs('roles.index');
        $response->assertViewHas('roles');
    }
}
