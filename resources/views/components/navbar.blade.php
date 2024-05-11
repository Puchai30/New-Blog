<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">

            <a href="/#blogs" class="nav-link">Blogs</a>

            @auth
                {{-- @can('admin') --}}
                    <a href="/admin/blogs" class="nav-link">Dashbloard</a>
                {{-- @endcan --}}

                <img src="{{ auth()->user()->avator }}" width="35" height="35" class="rounded-circle">

                <a href="" class="nav-link">Welcome {{ auth()->user()->name }}</a>

                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">Logout</button>
                </form>
            @else
                <a href="/login" class="nav-link">Login</a>
                <a href="/register" class="nav-link">Resgister</a>
            @endauth


            <a href="/#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
