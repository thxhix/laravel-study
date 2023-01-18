@extends('app')

@section('title', $post['title'])

@section('content')

    <div class="back">
        <a href="/posts/">Вернуться назад</a>
    </div>

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    @isset($post['has_comments'])
    <hr>
    <p>Комментарии:</p>
    @endisset
@endsection
