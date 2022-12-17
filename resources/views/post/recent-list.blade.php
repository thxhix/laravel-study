@extends('app')

@section('title', "Recent " . $date . " Page")


@section('content')
    <h1>Recent list of {{ $date }}</h1>
@endsection
