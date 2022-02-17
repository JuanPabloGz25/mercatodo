<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list_products(): void
    {
        Permission::create(['name' => 'ver-product']);
        $user = User::factory()->create()->givePermissionTo('ver-product');
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
    }
}
