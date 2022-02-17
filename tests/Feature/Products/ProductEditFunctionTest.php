<?php

namespace Tests\Feature\Products;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductEditFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_edit_an_product(): void
    {
        Permission::create(['name' => 'editar-product']);
        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-product');
        $response = $this->actingAs($user)->get("/products/{$product->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas('product');
    }
}
