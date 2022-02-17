<?php

namespace Tests\Feature\Products;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductUpdateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_update_the_changes_of_edit_a_product(): void
    {
        Permission::create(['name' => 'editar-product']);
        $request = [
            'code' => 100000,
            'marca' => 'marca product',
            'linea' => 'linea product',
            'especificaciones' => 'especificaciones product',
            'price' => 10,
            'stock' => 10,
        ];

        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-product');
        $response = $this->actingAs($user)->patch(route('products.update', $product), $request);
        $response->assertRedirect();
        $product = $product->refresh();
        $this->assertEquals($request['code'], $product->code);

    }
}
