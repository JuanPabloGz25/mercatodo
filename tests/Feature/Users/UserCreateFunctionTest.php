<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserCreateFunctionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_create_users(): void
    {
        Permission::create(['name' => 'crear-user']);
        $user = User::factory()->create()->givePermissionTo('crear-user');
        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertStatus(200);
    }
}
