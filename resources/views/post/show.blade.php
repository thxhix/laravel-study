@extends('app')

@section('title', $post['title'])

@section('content')
    <h1>{{$post['title']}}</h1>
    <p>{{$post['description']}}</p>
@endsection
