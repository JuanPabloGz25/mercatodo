<?php

namespace Tests\Feature\Products;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductCreateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanAccessToTheRouteForCreate(): void
    {
        Permission::create(['name' => 'crear-productos']);
        $user = User::factory()->create()->givePermissionTo('crear-productos');
        $response = $this->actingAs($user)->get(route('products.create'));
        $response->assertStatus(200);
    }
}
