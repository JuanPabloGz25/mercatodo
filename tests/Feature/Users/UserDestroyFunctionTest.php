<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserDestroyFunctionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanDestroyUsers(): void
    {
        Permission::create(['name' => 'borrar-usuarios']);
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('borrar-usuarios');
        $response = $this->actingAs($user)->delete("/users/{$user2->id}");
        $response->assertRedirect();
    }
}
