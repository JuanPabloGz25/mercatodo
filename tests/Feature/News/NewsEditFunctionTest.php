<?php

namespace Tests\Feature\News;

use App\Models\News\News;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsEditFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanEditANew(): void
    {
        Permission::create(['name' => 'editar-noticias']);
        $new = News::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-noticias');
        $response = $this->actingAs($user)->get("/news/{$new->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('news.edit');
        $response->assertViewHas('news');
    }
}
