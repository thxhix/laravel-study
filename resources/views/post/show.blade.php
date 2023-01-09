@extends('app')

@section('title', $post['title'])

@section('content')

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
