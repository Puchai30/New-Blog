@props(['blogger'])

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <img src="/storage/{{ $blogger->thumbnail }}"
                class="card-img-top" alt="..." />
            <h3 class="my-3">{{ $blogger->title }}</h3>
            <p class="fs-6 text-secondary">
                <a href="/?username={{ $blogger->author->username }}">{{ $blogger->author->name }}</a>
            <div class="tags my-3">
                <a href="/?category={{ $blogger->category->slug }}"><span
                        class="badge bg-primary">{{ $blogger->category->name }}</span></a>
            </div>

            <div class="text-secondary">{{ $blogger->created_at->diffForHumans() }}</div>

            <div class="text-secondary">
                <form action="/blog/{{ $blogger->slug }}/subscribe" method="POST">
                    @csrf
                    @auth
                    @if (auth()->user()->isSubsribed($blogger))
                        <button class="btn btn-danger">unsubscribe</button>
                    @else
                        <button class="btn btn-warning">subscribe</button>
                    @endif
                    @endauth

                </form>
            </div>

            </p>
            <p class="lh-md">
                {!! $blogger->body !!}
            </p>
        </div>
    </div>
</div>
