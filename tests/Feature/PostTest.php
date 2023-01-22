<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testPostsIsEmptyInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('Нет доступных постов!');
    }

    public function testCreate1BlogPostAndSeeThis()
    {
        $post = new BlogPost();
        $post->title = 'UnitTest Post';
        $post->content = 'Lorem ipsum dolor sit amet.';
        $post->save();

        $response = $this->get('/posts');
        $response->assertSeeText('UnitTest Post');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'UnitTest Post',
            'content' => 'Lorem ipsum dolor sit amet.'
        ]);
    }

    public function testStoreNewPost()
    {
        $data = [
            'title' => 'UnitTest Post',
            'content' => 'Lorem ipsum dolor sit amet.'
        ];
        $this->post('/posts', $data)
            ->assertStatus(302)
            ->assertSessionHas('status_text', '📑 Пост успешно добавлен');
    }

    public function testStoreNewPostFailed()
    {
        $data = [
            'title' => 'So',
            'content' => 'Small'
        ];

        $this->post('/posts', $data)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $msg = session('errors')->getMessages();

        $this->assertEquals($msg['title'][0], 'The title must be at least 3 characters.');
        $this->assertEquals($msg['content'][0], 'The content must be at least 10 characters.');
    }
}
