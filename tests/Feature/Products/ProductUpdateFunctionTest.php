<?php

namespace Tests\Feature\Products;

use App\Models\Products\Products;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductUpdateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanUpdateTheChangesOfEditProducts(): void
    {
        Permission::create(['name' => 'editar-productos']);
        $request = [
            'code' => 123456,
            'category' => 'category test',
            'brand' => 'brand test',
            'line' => 'line test',
            'model' => 2020,
            'color' => 'color test',
            'transmission' => 'transmission test',
            'kilometre' => 2500,
            'engine' => 'engine test',
            'fuel' => 'fuel test',
            'torque' => 'torque test',
            'power' => 'power test',
            'price' => 10000,
            'stock' => 10,
            'description' => 'description test',
        ];

        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-productos');
        $response = $this->actingAs($user)->patch(route('products.update', $product), $request);
        $response->assertRedirect();
        $product = $product->refresh();
        $this->assertEquals($request['code'], $product->code);

    }
}
