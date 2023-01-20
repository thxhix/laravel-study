@extends('app')

@section('title', 'Создать пост')

@section('content')
    <a href="/posts">Назад</a>
    <h1 style="margin-bottom: 5px">Создать пост: </h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('post.partials.form')

        <button type="submit">Добавить</button>
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
