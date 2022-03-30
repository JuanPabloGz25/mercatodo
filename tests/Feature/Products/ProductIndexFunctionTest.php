<?php

namespace Tests\Feature\Products;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanListProducts(): void
    {
        Permission::create(['name' => 'ver-productos']);
        $user = User::factory()->create()->givePermissionTo('ver-productos');
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
    }
}
