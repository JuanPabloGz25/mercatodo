<?php

namespace Tests\Feature\Products;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductDestroyFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_destroy_products(): void
    {
        Permission::create(['name' => 'borrar-product']);
        $data = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('borrar-product');
        $response = $this->actingAs($user)->delete("/products/{$data->id}");
        $response->assertRedirect();
    }
}
