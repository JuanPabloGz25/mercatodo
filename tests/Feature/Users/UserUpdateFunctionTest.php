<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserUpdateFunctionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_update_the_changes_of_users(): void
    {
        Permission::create(['name' => 'editar-user']);
        $request = [
            'name' => 'Adolfo',
        ];
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-user');

        $response = $this->actingAs($user)->patch(route('users.update', $user2->id), $request);
        $response->assertRedirect();

        $user2 = $user2->refresh();
        $this->assertEquals($request['name'], $user2->name);
    }
}
