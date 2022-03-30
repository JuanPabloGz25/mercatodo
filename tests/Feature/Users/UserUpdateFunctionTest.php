<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
    public function testItCanUpdateTheChangesOfTheUsers(): void
    {
        Permission::create(['name' => 'editar-usuarios']);
        $request = [
            'name' => 'Mrs. Selina Rowed',
        ];
        $user2 = User::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-usuarios');

        $response = $this->actingAs($user)->patch(route('users.update', $user2->id), $request);
        $response->assertRedirect();

        $user2->refresh();
    }
}
