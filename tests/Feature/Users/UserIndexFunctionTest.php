<?php

namespace Tests\Feature\Users;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_index_users(): void
    {
        Permission::create(['name' => 'ver-user']);
        $user = User::factory()->create()->givePermissionTo('ver-user');
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertStatus(200);
        $response->assertViewIs('users.index');
    }

}
