<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-3">Login</h3>
                <div class="card p-4 my-3 shadow-sm">

                    <form method="POST" action="">
                        @csrf

                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input required type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">

                                <x-error name="email"></x-error>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input required type="password" name="password" class="form-control" id="exampleInputPassword1">

                            <x-error name="password"></x-error>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <x-all-error></x-all-error>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
