<x-admin-layout>

    <h3 class="my-3 text-center">Blog Edit Form</h3>

        <x-card-wrapper>

            <form action="/admin/blogs/{{ $blog->slug }}/update" method="POST" enctype="multipart/form-data"  >
                @method('patch')
                @csrf


                <x-form.input name="title" value="{{ $blog->title }}" ></x-form.input>

                <x-form.input name="intro" value="{{ $blog->intro }}"></x-form.input>

                <x-form.input name="slug" value="{{ $blog->slug }}"></x-form.input>

                <x-form.textarea name="body" value="{{ $blog->body }}"></x-form.textarea>

                <x-form.input name="thumbnail" type="file"></x-form.input>
                <img src="/storage/{{ $blog->thumbnail }}" width="200px" height="100px">

                <x-form.input-wrapper>
                    <x-form.label name="category"></x-form.label>

                    <select class="form-control" name="category_id" id="category">

                        @foreach ($categories as $category)
                            <option {{ $category->id==old('category_id', $blog->category->id) ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    <x-error name="category_id"></x-error>
                </x-form.input-wrapper>

                    <div class="d-flex justiy-contnet-start mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </x-card-wrapper>

</x-admin-layout>
