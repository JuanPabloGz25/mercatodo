<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_it_can_edit_an_user(): void
    {
        Permission::create(['name' => 'editar-user']);
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-user');
        $response = $this->actingAs($user)->get("/users/{$user2->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user');
    }
}
