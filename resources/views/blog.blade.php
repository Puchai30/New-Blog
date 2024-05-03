{{-- @extends('layout')
@section('title')
    <title>{{ $blogeer->title }}</title>
@endsection
@section('content') --}}

<x-layout>


    <x-slot name="title">
        <title>{{ $blogeer->title }}</title>
    </x-slot>

    <x-slot name="content">
        <h1>{{ $blogeer->title }}</h1>

        @if (true)
            <h4>This is Condition</h4>
        @endif

        <p>published at - {{ $blogeer->created_at->diffForHumans() }}</p>

        <body>
            {{ $blogeer->body }}
        </body>

        <hr>
        <a href="/">go back</a>

    </x-slot>
</x-layout>



{{-- @endsection --}}
