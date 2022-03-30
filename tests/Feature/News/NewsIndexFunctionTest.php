<?php

namespace Tests\Feature\News;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class NewsIndexFunctionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanListNews(): void
    {
        Permission::create(['name' => 'ver-noticias']);
        $user = User::factory()->create()->givePermissionTo('ver-noticias');
        $response = $this->actingAs($user)->get(route('news.index'));
        $response->assertStatus(200);
        $response->assertViewIs('news.index');
        $response->assertViewHas('news');
    }
}
