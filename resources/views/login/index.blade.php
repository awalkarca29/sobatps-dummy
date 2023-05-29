@extends('layouts.logreg')

@section('container')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-5">
            @if (session()->has('successRegist'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successRegist') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center mt-2">Please Login</h1>
                <form>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
                </form>
                <small class="d-block text-end mt-2">Not registered? <a href="/register">Register here!</a></small>
            </main>
        </div>
    </div>
@endsection
