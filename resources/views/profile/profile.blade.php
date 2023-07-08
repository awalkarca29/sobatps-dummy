@extends('layouts.profile')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil</div>
                    <div class="row justify-content-center">
                        @if (session()->has('createProduct'))
                            <div class="alert alert-success col-lg-4 text-center" role="alert">
                                {{ session('createProduct') }}
                            </div>
                        @elseif(session()->has('successDelete'))
                            <div class="alert alert-danger col-lg-4 text-center" role="alert">
                                {{ session('successDelete') }}
                            </div>
                        @elseif(session()->has('successUpdate'))
                            <div class="alert alert-success col-lg-4 text-center" role="alert">
                                {{ session('successUpdate') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Foto Profil"
                                class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Nama</strong></label>
                            <input type="text" class="form-control rounded-4" id="name" name="name"
                                value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label"><strong>Username</strong></label>
                            <input type="text" class="form-control rounded-4" id="username" name="username"
                                value="{{ old('username', $user->username) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>E-mail</strong></label>
                            <input type="text" class="form-control rounded-4" id="email" name="email"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label"><strong>Kota</strong></label>
                            <input type="text" class="form-control rounded-4" id="city" name="city"
                                value="{{ old('city', $user->city) }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"><strong>Alamat</strong></label>
                            <input type="text" class="form-control rounded-4" id="address" name="address"
                                value="{{ old('address', $user->address) }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><strong>Nomor Telepon</strong></label>
                            <input type="text" class="form-control rounded-4" id="phone" name="phone"
                                value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>
                </div>
                <a href="/products" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> |
                    Kembali</a>
                <a href="/profile/{{ $user->username }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> |
                    Ubah profil</a>
            </div>
        </div>
    </div>
@endsection
