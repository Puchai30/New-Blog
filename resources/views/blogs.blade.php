
<x-layout>

    <!-- hero section -->
    <x-hero></x-hero>

    <!-- blogs section -->
    <x-blog-section
    :blogs="$blogs"
    :categories="$categories"
    :currentCategory="$currentCategory ?? null">
    </x-blog-section>

    <!-- subscribe new blogs -->
    <x-subscribe></x-subscribe>


</x-layout>
