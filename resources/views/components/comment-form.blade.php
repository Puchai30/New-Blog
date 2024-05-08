@props(['blogger'])

<x-card-wrapper>
    <form action="/blog/{{ $blogger->slug }}/comments" method="post">
        @csrf
        <div class="mb-3">
            <textarea required name="body" class="form-control border border-0" placeholder="Say something...."
                cols="30" rows="5"></textarea>

                <x-error name="body"></x-error>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-card-wrapper>
