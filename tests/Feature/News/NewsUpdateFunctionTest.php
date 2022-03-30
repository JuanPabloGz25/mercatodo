<?php

namespace Tests\Feature\News;

use App\Models\News\News;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsUpdateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanUpdateTheChangesOfEditNews(): void
    {
        Permission::create(['name' => 'editar-noticias']);
        $request = [
            'title' => 'title test',
            'description' => 'description test',
            'content' => 'content test',
            'author' => 'author test',
            'date' => 'date test',
            'category' => 'category test',
        ];

        $new = News::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-noticias');
        $response = $this->actingAs($user)->patch(route('news.update', $new), $request);
        $response->assertRedirect();
        $new = $new->refresh();
        $this->assertEquals($request['title'], $new->title);

    }
}
