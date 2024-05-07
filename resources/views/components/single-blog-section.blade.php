<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                class="card-img-top" alt="..." />
            <h3 class="my-3">{{ $blogger->title }}</h3>
            <p class="fs-6 text-secondary">
                <a href="/?username={{ $blogger->author->username }}">{{ $blogger->author->name }}</a>
            <div class="tags my-3">
                <a href="/?category={{ $blogger->category->slug }}"><span
                        class="badge bg-primary">{{ $blogger->category->name }}</span></a>
            </div>
            <span>{{ $blogger->created_at->diffForHumans() }}</span>

            </p>
            <p class="lh-md">
                {{ $blogger->body }}
            </p>
        </div>
    </div>
</div>
