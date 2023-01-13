@extends('app')

@section('title', $post['title'])

@section('content')

    <div class="back">
        <a href="/posts/">Вернуться назад</a>
    </div>

    @if ($post['is_new'])
        <p>Это новый пост!</p>
    @elseif(!$post['is_new'])
        <p>Это старый пост!</p>
    @endif

    @unless($post['is_new'])
    <p>Это отрисуется только если пост старый (unless->false)</p>
    @endunless

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['description'] }}</p>

    @isset($post['has_comments'])
    <hr>
    <p>Комментарии:</p>
    @endisset
@endsection
