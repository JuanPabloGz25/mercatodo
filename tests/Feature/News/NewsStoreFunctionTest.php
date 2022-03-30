<?php

namespace Tests\Feature\News;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsStoreFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanStoreNews(): void
    {
        Permission::create(['name' => 'crear-noticias']);
        $data= [
            'title' => 'title test',
            'description' => 'description test',
            'content' => 'content test',
            'author' => 'author test',
            'date' => 'date test',
            'category' => 'category test',
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(250),
        ];
        $user = User::factory()->create()->givePermissionTo('crear-noticias');
        $response = $this->actingAs($user)->post(route('news.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}
