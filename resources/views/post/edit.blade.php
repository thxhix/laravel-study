@extends('app')

@section('title', 'Создать пост')

@section('content')
    @include('post.partials.back', [])
    <h1 style="margin-bottom: 5px">Изменить пост: </h1>

    <div class="post-form">
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('post.partials.form', ['button_text' => '✏️ Изменить'])
        </form>
    </div>

@endsection
