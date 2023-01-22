@extends('app')

@section('title', 'Создать пост')

@section('content')
    @include('post.partials.back', [])

    <h1 style="margin-bottom: 5px">Создать пост: </h1>

    <form class="post-form" action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('post.partials.form', ['button_text' => '📥 Создать'])
    </form>
@endsection
