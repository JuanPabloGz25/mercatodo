<?php

namespace Tests\Feature\Products;

use App\Models\Products\Products;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductEditFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanEditAnProduct(): void
    {
        Permission::create(['name' => 'editar-productos']);
        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-productos');
        $response = $this->actingAs($user)->get("/products/{$product->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas('product');
    }
}
