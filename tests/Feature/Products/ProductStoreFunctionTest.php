<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductStoreFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_store_a_product(): void
    {
        Permission::create(['name' => 'crear-product']);
        $data= [
            'code' => 100000,
            'marca' => 'marca test',
            'linea' => 'linea test',
            'especificaciones' => 'especificaciones test',
            'price' => 100,
            'stock' => 10,
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(250),
        ];
        $user = User::factory()->create()->givePermissionTo('crear-product');
        $response = $this->actingAs($user)->post(route('products.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}
