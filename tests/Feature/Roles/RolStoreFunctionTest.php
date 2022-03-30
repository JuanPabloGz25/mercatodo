<?php

namespace Tests\Feature\Roles;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class RolStoreFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanStoreRoles(): void
    {
        Permission::create(['name' => 'crear-roles']);
        $data = [
            'name' => 'rol test',
            'permission' => 'crear-roles'
        ];

        $user = User::factory()->create()->givePermissionTo('crear-roles');
        $response = $this->actingAs($user)->post(route('roles.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('roles', Arr::only($data,['name']));
    }
}
