<?php

namespace Tests\Feature\Products;

use App\Models\Products\Products;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductDestroyFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanDestroyProducts(): void
    {
        Permission::create(['name' => 'borrar-productos']);
        $data = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('borrar-productos');
        $response = $this->actingAs($user)->delete("/products/{$data->id}");
        $response->assertRedirect();
    }
}
