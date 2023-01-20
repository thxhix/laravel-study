@extends('app')

@section('title', $post['title'])

@section('content')

    <div class="back">
        <a href="/posts/">Вернуться назад</a>
    </div>

    @if (session('status') == 'true')
        <div style="background: green">{{ session('status_text') }}</div>
    @endif

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    <a href="/posts/{{ $id }}/edit">Редактировать</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete post</button>
    </form>
    <a href="/posts/{{ $id }}/destroy">Удалить</a>
@endsection
