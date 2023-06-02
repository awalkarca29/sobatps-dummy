@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6 p-4">
                {{-- <div id="carouselExampleIndicators" class="carousel slide rounded-3">
                    <div class="carousel-indicators mb-0">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner rounded-3 mb-lg-0 mb-sm-3">
                        <div class="carousel-item active">
                            <img src="https://source.unsplash.com/1200x800?{{ $product->category->category_name }}"
                                alt="{{ $product->title }}" class="d-block w-100" style="max-height: 100%">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/1200x800?{{ $product->category->category_name }}"
                                alt="{{ $product->title }}" class="d-block w-100" style="max-height: 380em">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/1200x800?{{ $product->category->category_name }}"
                                alt="{{ $product->title }}" class="d-block w-100" style="max-height: 380em">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> --}}
                @if ($product->image)
                    <div style="overflow:hidden; max-height:25em; max-width: auto;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="img-fluid rounded-4 ">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x800?{{ $product->category->category_name }}" class="rounded-4"
                        alt="{{ $product->category->category_name }}" style="overflow: hidden;">
                @endif
            </div>
            <div class="col-lg-6 m-auto p-4">
                <div class="card mb-3 border-0 shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <button type="category-button"
                            class="btn btn-outline-success p-1 mb-4"href="/categories/{{ $product->category->slug }}">
                            {{ $product->category->category_name }}
                        </button>
                        <h2 class="font-weight-bold">Rp. {{ number_format($product->price, 2, ',', '.') }}
                        </h2>
                        <button type="buy" class="btn btn-success w-100 p-auto font-weight-bold">Buy Now </button>
                    </div>
                </div>
                <h6 class="descript mb-3">Deskripsi Produk
                </h6>
                <div class="card">
                    <div class="card-body">
                        <p class="description">{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3 mt-2">{{ $product->title }}</h2>
                <img src="https://source.unsplash.com/1200x400?{{ $product->category->category_name }}"
                    alt="{{ $product->title }}" class="img-fluid">
                <h6 class="mt-3">Kategori Produk : <a href="/products?category={{ $product->category->slug }}"
                        class="text-decoration-none">{{ $product->category->category_name }}</a>
                </h6>
                <h6>Diproduksi oleh <a href="/products?user={{ $product->user->username }}" class="text-decoration-none">
                        {{ $product->user->name }}
                    </a></h6>
                <h6>Rp. {{ number_format($product->price, 2, ',', '.') }}</h6>
                {!! $product->description !!}

                <a href="/products" class="d-block mt-2" class="text-decoration-none">Back to Products</a>
            </div>
        </div>
    </div> --}}
@endsection
