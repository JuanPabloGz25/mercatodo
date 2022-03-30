<?php

namespace Tests\Feature\News;

use App\Models\News\News;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsDestroyFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanDestroyNews(): void
    {
        Permission::create(['name' => 'borrar-noticias']);
        $data = News::factory()->create();
        $user = User::factory()->create()->givePermissionTo('borrar-noticias');
        $response = $this->actingAs($user)->delete("/news/{$data->id}");
        $response->assertRedirect();
    }
}
