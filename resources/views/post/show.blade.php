@extends('app')

@section('title', $post['title'])

@section('content')

    <div class="back">
        <a href="/posts/">Вернуться назад</a>
    </div>

    @if (session('status') == 'true')
        <div style="background: green">Пост создан!</div>
    @endif

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    @isset($post['has_comments'])
        <hr>
        <p>Комментарии:</p>
    @endisset
@endsection
