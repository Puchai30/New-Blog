{{-- @extends('layout')

@section('title')
    <title>All Blog</title>
@endsection
@section('content') --}}

<x-layout>
    <x-slot name="title">
        <title>All Blog</title>
    </x-slot>

    <x-slot name="content">
        @foreach ($blogs as $blog)

                <h1><a href="blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>

                <p>
                    <a href="category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                </p>

                <div>
                    <p>published at - {{ $blog->created_at->diffForHumans() }}</p>
                    <p>{{ $blog->intro }}</p>
                </div>
            </div>
        @endforeach

    </x-slot>
</x-layout>

{{-- @endsection --}}
