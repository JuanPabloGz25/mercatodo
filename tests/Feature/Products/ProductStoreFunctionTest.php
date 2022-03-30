<?php

namespace Tests\Feature\Products;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductStoreFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanStoreProducts(): void
    {
        Permission::create(['name' => 'crear-productos']);
        $data= [
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
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(250),
        ];
        $user = User::factory()->create()->givePermissionTo('crear-productos');
        $response = $this->actingAs($user)->post(route('products.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}
