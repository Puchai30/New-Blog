
<x-layout>

    <!-- single blog section -->
    <x-single-blog-section :blogger="$blogger"></x-single-blog-section>

    <!-- subscribe new blogs -->
    <x-subscribe></x-subscribe>

    <x-blogs-you-may-like :randomBlogs="$randomBlogs"></x-blogs-you-may-like>

</x-layout>
