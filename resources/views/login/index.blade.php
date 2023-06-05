@extends('layouts.logreg')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0 g-0">
                <div class="container d-flex h-100 position-absolute d-flex align-items-center pl-4">
                    <div class="row">
                        <div class="col-12 p-5"><img src="/img/ecommerce.png" class="pl-4" alt=""
                                style="max-height: 4em">
                        </div>
                    </div>
                </div>

                <img src="/img/hutan.png" alt="" class="object-fit-cover w-100">

            </div>
            <div class="col-lg-6 d-flex p-5 align-items-center">

                @if (session()->has('successRegist'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('successRegist') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div id="success-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center mt-2">Please Login</h1>
                    <form action="/login" method="post">
                        @csrf
                        <h6>Email</h6>
                        <div class="form-floating mb-3">
                            <input type="email" name="email"
                                class="form-control rounded-4 @error('email') is-invalid @enderror" id="email"
                                placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <h6>Password</h6>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control rounded-4" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button class="h3 w-100 btn btn-success btn-lg mt-2 rounded-4" type="submit">Login</button>
                    </form>
                    <small class="d-block text-end mt-2">Not registered? <a href="/register">Register here!</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection
