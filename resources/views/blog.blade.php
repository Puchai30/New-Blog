{{-- @extends('layout')
@section('title')
    <title>{{ $blogeer->title }}</title>
@endsection
@section('content') --}}

<x-layout>


    <x-slot name="title">
        <title>{{ $blogger->title }}</title>
    </x-slot>

    <x-slot name="content">
        <h1>{{ $blogger->title }}</h1>

        <p>published at - {{ $blogger->created_at->diffForHumans() }}</p>

        <body>
            {{ $blogger->body }}
        </body>

        <hr>
        <a href="/">go back</a>

    </x-slot>
</x-layout>



{{-- @endsection --}}
