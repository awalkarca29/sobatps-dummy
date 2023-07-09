@extends('layouts.profile')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            @if (session()->has('createProduct'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('createProduct') }}
                </div>
            @elseif(session()->has('successDelete'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('successDelete') }}
                </div>
            @elseif(session()->has('successUpdate'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successUpdate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row justify-content-center mt-5">

            <div class="col-lg-4">
                <div class="card m-auto shadow border-0 rounded-4" style="width: 80%">
                    <div class="card-body ">
                        <div class="text-center m-4">
                            <form method="POST" action="/profile/image/{{ $user->username }}"
                                class="mb-3 d-flex flex-column" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <input class="form-label" type="hidden" name="oldImage" value="{{ $user->image }}">
                                @if ($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}"
                                        class="img-preview rounded-circle img-fluid mb-3" id="imagePreview"
                                        style="display:block">
                                @else
                                    <div>
                                        <img src="" class="img-preview rounded-circle img-fluid mb-3"
                                            id="imagePreview" style="max-height: 10em; overflow:hidden">
                                    </div>
                                @endif
                                <label for="image" class="btn btn-outline-success btn-block border-0 form-label">Upload
                                    Photo</label>
                                <button type="submit" class="btn btn-success btn-block ">Simpan Foto</button>


                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="previewImage()" style="visibility:hidden">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </form>
                        </div>
                        <div class="col-lg d-flex justify-content-center mb-1">
                            <a href="/profile/{{ $user->username }}/edit"
                                class="btn btn-outline-success w-100 btn-block border-0"><i class="bi bi-pencil-square"></i>
                                Edit Profile</a>
                        </div>
                        <div class="col-lg d-flex justify-content-center mb-1">
                            <button type="button" class="btn btn-outline-success w-100 btn-block border-0">Reset
                                Password</button>
                        </div>
                        @if (auth()->user()->isAdmin)
                            <div class="col-lg d-flex justify-content-center mb-5 w-100">
                                <a href="/purchase/records" class="btn btn-outline-success w-100 btn-block border-0"><i
                                        class="bi bi-receipt-cutoff"></i>Histori
                                    Penjualan</a>
                            </div>
                        @else
                            <div class="col-lg d-flex justify-content-center mb-5 w-100">
                                <a href="/purchase/history" class="btn btn-outline-success w-100 btn-block border-0"><i
                                        class="bi bi-receipt-cutoff"></i>Histori
                                    Pembelian</button></a>
                            </div>
                        @endif
                        <div class="col-lg d-flex justify-content-center mt-5">
                            <form action="/logout" method="post" class="btn btn-danger">
                                @csrf
                                <button type="submit" class="btn dropdown-item btn-danger" style="border:1rem">
                                    <i class="bi bi-box-arrow-right">
                                    </i>
                                    Logout</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom border-3">
                    <h1 class="h1 text-success font-weight-bold text-center">Profile</h1>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control rounded-4 @error('name') is-invalid @enderror" id="name"
                        name="name" readonly value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control rounded-4 @error('username') is-invalid @enderror"
                        id="username" name="username" readonly readonly value="{{ old('username', $user->username) }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" class="form-control rounded-4 @error('email') is-invalid @enderror" id="email"
                        name="email" readonly value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Kota</label>
                    <input type="text" class="form-control rounded-4 @error('city') is-invalid @enderror"
                        id="city" name="city" readonly value="{{ old('city', $user->city) }}">
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control rounded-4 @error('phone') is-invalid @enderror"
                        id="phone" name="phone" readonly value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1 address" class="form-label">Alamat</label>
                    <input type="text"
                        class="form-control align-items-start rounded-4 @error('address') is-invalid @enderror"
                        id="address" name="address" readonly value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- <a href="/products" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> |
                    Kembali</a>
                <a href="/profile/{{ $user->username }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> |
                    Ubah profil</a> --}}


        </div>
        <script>
            function previewImage() {
                imagePreview.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    @endsection
