<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    {{-- @yield('title') --}}
    {{ $title }}
</head>

<style>
    .bg-color {
        background-color: gold
    }
</style>

<body>

    {{-- @yield('content') --}}
    <x-navbar></x-navbar>

    {{ $content }}
</body>

</html>
