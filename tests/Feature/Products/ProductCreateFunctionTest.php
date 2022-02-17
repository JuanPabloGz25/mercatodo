<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductCreateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_access_to_the_route_for_create(): void
    {
        Permission::create(['name' => 'crear-product']);
        $user = User::factory()->create()->givePermissionTo('crear-product');
        $response = $this->actingAs($user)->get(route('products.create'));
        $response->assertStatus(200);
    }
}
