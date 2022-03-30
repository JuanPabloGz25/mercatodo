<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserCreateFunctionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanCreateUsers(): void
    {
        Permission::create(['name' => 'crear-usuarios']);
        $user = User::factory()->create()->givePermissionTo('crear-usuarios');
        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertStatus(200);
    }
}
