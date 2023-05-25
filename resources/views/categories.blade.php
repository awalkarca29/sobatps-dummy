@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Kategori Produk Kami</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-4">
                    <a href="/categories/{{ $category->slug }}">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/500x400?{{ $category->category_name }}" class="card-img"
                                alt="{{ $category->category_name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3"
                                    style="background-color: rgba(0,0,0,0.5)">
                                    {{ $category->category_name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
