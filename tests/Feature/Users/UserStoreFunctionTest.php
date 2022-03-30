<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserStoreFunctionTest extends TestCase

{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItCanStoreUsers(): void
    {
        Permission::create(['name' => 'crear-usuarios']);
        $data = $this->userData();
        $user = User::factory()->create()->givePermissionTo('crear-usuarios');
        $response = $this->actingAs($user)->post(route('users.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('users', Arr::only($data,['name','email']));
    }

    private function userData(): array
    {
        return [
            'name' => 'Omar',
            'lastname' => 'Barbosa',
            'document' => '123456789',
            'email' => 'omar@prueba.com',
            'phone' => '3167255464',
            'gender' => 'Masculino',
            'password' => '12345678',
            'confirm-password' => '12345678' ,
        ];
    }
}
