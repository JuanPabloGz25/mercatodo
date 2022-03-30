<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserEditFunctionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanEditAnUser(): void
    {
        Permission::create(['name' => 'editar-usuarios']);
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-usuarios');
        $response = $this->actingAs($user)->get("/users/{$user2->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user');
    }
}
