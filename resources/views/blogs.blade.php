@extends('layout')

@section('title')
    <title>All Blog</title>
@endsection

@section('content')
    @foreach ($blogs as $blog)
        <div class={{ $loop->odd ? 'bg-color' : '' }}>
            <h1><a href="blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>

            <div>
                <p>published at{{ $blog->date }}</p>
                <p>{{ $blog->intro }}</p>
            </div>
        </div>
    @endforeach
@endsection
