@extends('app')

@section('title', 'Создать пост')

@section('content')
    @include('post.partials.back', [])
    <h1 style="margin-bottom: 5px">Изменить пост: </h1>

    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT')


        @include('post.partials.form')

        <button type="submit">Изменить</button>
    </form>

    <style>
        form {
            margin-top: 60px;
            width: 300px;
        }

        input {
            margin-bottom: 20px;
            width: 100%;
            display: block;
        }

        textarea {
            width: 100%;
        }
    </style>
@endsection
