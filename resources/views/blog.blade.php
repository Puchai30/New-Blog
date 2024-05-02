@extends('layout')

@section('title')
    <title>{{ $blogeer->title }}</title>
@endsection

@section('content')
    <h1>{{ $blogeer->title }}</h1>
    @if (true)
        <h4>This is Condition</h4>
    @endif
    <p>published at{{ $blogeer->date }}</p>

    <body>
        {{ $blogeer->body }}
    </body>

    <hr>
    <a href="/">go back</a>
@endsection
