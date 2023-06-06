@extends('layouts.profile')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Profil</h1>
    </div>
    <div class="col-lg">
        <form method="POST" action="/profile/{{ $user->username }}" class="mb-3" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required readonly value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" required value="{{ old('address', $user->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Kota</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                    required value="{{ old('city', $user->city) }}">
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" required value="{{ old('phone', $user->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input type="hidden" name="oldImage" value="{{ $user->image }}">
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 col-sm-6"
                        id="imagePreview" style="display:block">
                @else
                    <div>
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" id="imagePreview"
                            style="max-height: 500px; overflow:hidden">
                    </div>
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-primary">Ubah Profil</button>
        </form>
    </div>

    {{-- <script>
        function previewImage() {
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script> --}}
@endsection
