<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class RolStoreFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_store_a_rol(): void
    {
        Permission::create(['name' => 'crear-rol']);
        $data = [
            'name' => 'rol test',
            'permission' => 'crear-rol'
        ];

        $user = User::factory()->create()->givePermissionTo('crear-rol');
        $response = $this->actingAs($user)->post(route('roles.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('roles', Arr::only($data,['name']));
    }
}
