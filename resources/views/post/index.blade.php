@extends('app')

@section('title', 'Список постов')

@section('content')
    <h1 style="margin-bottom: 5px">Список постов: </h1>

    @if (count($posts) > 0)
        <p style="font-size: 12px; opacity: .45; margin-bottom: 25px">Всего: {{ count($posts) }}</p>
    @endif

    @if (count($posts) > 0)

        @foreach ($posts as $key => $post)
            @if ($loop->odd)
                <div>{{ $key }}. {{ $post['title'] }}</div>
            @else
                <div style="background: #eee">{{ $key }}. {{ $post['title'] }}</div>
            @endif
            <hr>
        @endforeach
    @else
        <p>Нет доступных постов!</p>
    @endif
@endsection
