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
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil"
                                class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                        </div>
                        <br>
                        <p><strong>Nama:</strong>
                            {{ $user->name ? $user->name : 'Update data untuk melengkapi bagian ini' }}</p>
                        <p><strong>Username:</strong>
                            {{ $user->username ? $user->username : 'Update data untuk melengkapi bagian ini' }}</p>
                        <p><strong>Email:</strong>
                            {{ $user->email ? $user->email : 'Update data untuk melengkapi bagian ini' }}</p>
                        <p><strong>Kota:</strong>
                            {{ $user->city ? $user->city : 'Update data untuk melengkapi bagian ini' }}</p>
                        <p><strong>Alamat:</strong>
                            {{ $user->address ? $user->address : 'Update data untuk melengkapi bagian ini' }}</p>
                        <p><strong>Nomor Telepon:</strong>
                            {{ $user->phone ? $user->phone : 'Update data untuk melengkapi bagian ini' }}
                        </p>
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
