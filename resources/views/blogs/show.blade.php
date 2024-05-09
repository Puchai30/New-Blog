<x-layout>

    <!-- single blog section -->
    <x-single-blog-section :blogger="$blogger"></x-single-blog-section>

    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blogger="$blogger"></x-comment-form>
            @else
                <p class="text-center">Please <a href="/login">Login </a>with comments</p>
            @endauth
        </div>
    </section>


    @if ($blogger->comments->count())
    <x-comments :comments="$blogger->comments()->latest()->paginate(3)"></x-comments>
    @endif

    <x-blogs-you-may-like :randomBlogs="$randomBlogs"></x-blogs-you-may-like>

</x-layout>
