<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanIndexUsers(): void
    {
        Permission::create(['name' => 'ver-usuarios']);
        $user = User::factory()->create()->givePermissionTo('ver-usuarios');
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertStatus(200);
        $response->assertViewIs('users.index');
    }

}
