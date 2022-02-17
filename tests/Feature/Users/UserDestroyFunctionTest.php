<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_destroy_users(): void
    {
        Permission::create(['name' => 'borrar-user']);
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('borrar-user');
        $response = $this->actingAs($user)->delete("/users/{$user2->id}");
        $response->assertRedirect();
    }
}
