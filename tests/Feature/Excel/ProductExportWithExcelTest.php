<?php

namespace Tests\Feature\Excel;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductExportWithExcelTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanExportProductUsingExcel()
    {
        Excel::fake();

        Permission::create(['name' => 'ver-productos']);
        $user = User::factory()->create()->givePermissionTo('ver-productos');
        $response = $this->actingAs($user)->get(route('export.products'));
        $response->assertOk();
        Excel::assertQueued('ZenithProducts.xlsx', 'public');
    }
}
