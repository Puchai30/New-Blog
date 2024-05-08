
<x-layout>

    @if (session('success'))
        <div class="div alert alert-success text-center">{{ session('success') }}</div>
    @endif
    <!-- hero section -->
    <x-hero></x-hero>

    <!-- blogs section -->
    <x-blog-section
    :blogs="$blogs">
    </x-blog-section>

</x-layout>
