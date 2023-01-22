@extends('app')

@section('title', $post['title'])

@section('content')

    <div class="post-detail">
        @include('post.partials.back', [])

        @if (session('status_text'))
            <div class="post-detail__success">✅ {{ session('status_text') }}</div>
        @endif

        <div class="post-detail-content">
            <h1 class="post-detail-content__title">{{ $post['title'] }}</h1>
            <p class="post-detail-content__content">{{ $post['content'] }}</p>
        </div>


        <div class="post-detail-actions">
            <a class="post-detail-actions__edit" href="/posts/{{ $id }}/edit">📝 Редактировать</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="post-detail-actions__delete" type="submit">🗑 Удалить пост</button>
            </form>
        </div>

    </div>
@endsection
