<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserStoreFunctionTest extends TestCase

{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_store_a_user(): void
    {
        Permission::create(['name' => 'crear-user']);
        $data = $this->userData();
        $user = User::factory()->create()->givePermissionTo('crear-user');
        $response = $this->actingAs($user)->post(route('users.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('users', Arr::only($data,['name','email']));
    }

    private function userData(): array
    {
        return [
            'name' => 'Alfredo',
            'email' => 'alfredo@prueba.com',
            'password' => '12345678',
            'confirm-password' => '12345678' ,
        ];
    }
}
