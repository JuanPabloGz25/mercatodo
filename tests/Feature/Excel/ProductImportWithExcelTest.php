<?php

namespace Tests\Feature\Excel;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ProductImportWithExcelTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanImportProductsWithExcelFiles()
    {
        Permission::create(['name' => 'crear-productos']);
        $user = User::factory()->create()->givePermissionTo('crear-productos');

        $file = new UploadedFile(
            base_path('tests/imports/import-test.xlsx'),
            'import-test.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        Excel::fake();
        $response = $this->actingAs($user)->post(route('import.products'), [
            'file' => $file
        ]);
        $response->assertRedirect();
    }
}
