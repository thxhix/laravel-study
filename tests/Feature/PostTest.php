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
        $post = $this->createDummyPost();

        $response = $this->get('/posts');
        $response->assertSeeText('Some post title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Some post title',
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

    public function testUpdatePostSuccess()
    {
        $post = $this->createDummyPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $data = [
            'title' => 'New post data',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing.'
        ];

        $this->put("/posts/{$post->id}", $data)
            ->assertStatus(302)
            ->assertSessionHas('status_text');

        $this->assertDatabaseHas('blog_posts', $data);
        $this->assertDatabaseMissing('blog_posts', ['title' => 'Some post title', 'content' => 'Lorem ipsum dolor sit amet.']);
    }

    public function testPostDelete()
    {
        $post = $this->createDummyPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302);

        $this->assertDatabaseMissing('blog_posts', $post->toArray());
    }



    private function createDummyPost()
    {
        $post = new BlogPost();
        $post->title = 'Some post title';
        $post->content = 'Lorem ipsum dolor sit amet.';
        $post->save();

        return $post;
    }
}
