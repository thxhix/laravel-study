@extends('app')

@section('title', 'Список постов')

@section('content')
    <div class="post-list">
        <div class="post-list__title">
            <h1 style="margin-bottom: 5px">Список постов: </h1>
            <div class="post-list__create">
                <a href="/posts/create">Создать пост!</a>
            </div>
        </div>

        <div class="post-list__count">
            @if (count($posts) > 0)
                <p style="font-size: 12px; opacity: .45; margin-bottom: 25px">Всего: {{ count($posts) }}</p>
            @endif
        </div>

        <div class="post-list-container">
            @if (count($posts) > 0)
                @foreach ($posts as $key => $post)
                    @include('post.partials.post', [])
                @endforeach
            @else
                <p>Нет доступных постов!</p>
            @endif
        </div>

    </div>

@endsection
