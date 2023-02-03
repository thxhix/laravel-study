<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $posts = BlogPost::withCount('comments')->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create', []);
    }

    public function store(StorePost $request)
    {
        $valid = $request->validated();
        $result = BlogPost::create($valid);
        if ($result) {
            $request->session()->flash('status_text', '📑 Пост успешно добавлен');
        }
        return Redirect::route('posts.show', ['post' => $result->id]);
    }

    public function show($id)
    {
        return view('post.show', ['id' => $id, 'post' => BlogPost::findOrFail($id)]);
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $valid = $request->validated();
        $result = $post->update($valid);
        if ($result) {
            $request->session()->flash('status_text', '🔖 Пост успешно обновлен');
        }
        return Redirect::route('posts.show', $id);
    }

    public function destroy($id)
    {
        BlogPost::findOrFail($id)->delete();
        return Redirect::route('posts.index', $id);
    }
}
