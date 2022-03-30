<?php

namespace Tests\Feature\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use App\Models\Users\User;

class NewsCreateFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanAccessToTheRouteForCreate(): void
    {
        Permission::create(['name' => 'crear-noticias']);
        $user = User::factory()->create()->givePermissionTo('crear-noticias');
        $response = $this->actingAs($user)->get(route('news.create'));
        $response->assertStatus(200);
    }
}
