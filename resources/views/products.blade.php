@extends('layouts.main')

@section('container')
    <div class="container-fluid g-0 shadow border-0">
        @if ($products->count())
            {{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active" style="max-height:400px">
                        <img src="https://source.unsplash.com/1200x400?{{ $products[0]->category->category_name }}"
                            class="d-block w-100" alt="{{ $products[0]->category->category_name }}"
                            style="overflow:hidden
                            ">
                        <div class="carousel-caption d-lg-block">
                            <h5>{{ $products[0]->title }}</h5>
                            <p>{{ $products[0]->excerpt }}</p>
                            <a href="/products/{{ $products[0]->slug }}"
                                class="text-decoration-none btn btn-success p-2">Lihat
                                Produk</a>
                        </div>
                    </div>
                    <div class="carousel-item" style="max-height:400px">
                        <img src="https://source.unsplash.com/1200x400?{{ $products[1]->category->category_name }}"
                            class="d-block w-100" alt="{{ $products[1]->category->category_name }}"
                            style="overflow:hidden
                            ">
                        <div class="carousel-caption d-lg-block">
                            <h5>{{ $products[1]->title }}</h5>
                            <p>{{ $products[1]->excerpt }}</p>
                            <a href="/products/{{ $products[1]->slug }}"
                                class="text-decoration-none btn btn-success p-2">Lihat
                                Produk</a>
                        </div>
                    </div>
                    <div class="carousel-item" style="max-height:400px">
                        <img src="https://source.unsplash.com/1200x400?{{ $products[2]->category->category_name }}"
                            class="d-block w-100" alt="{{ $products[2]->category->category_name }}"
                            style="overflow:hidden
                            ">
                        <div class="carousel-caption d-lg-block">
                            <h5>{{ $products[2]->title }}</h5>
                            <p>{{ $products[2]->excerpt }}</p>
                            <a href="/products/{{ $products[2]->slug }}"
                                class="text-decoration-none btn btn-success p-2">Lihat
                                Produk</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div> --}}
            <div class="card mb-4">
                @if ($products[0]->image)
                    <div style="max-height:25em; overflow:hidden; center">
                        <img src="{{ asset('storage/' . $products[0]->image) }}" alt="{{ $products[0]->title }}"
                            class="mx-auto d-block rounded-top">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $products[0]->category->slug }}"
                        alt="{{ $products[0]->title }}" class="img-fluid rounded-top">
                @endif

                <div class="card-body text-center">
                    <h3 class="card-title"><a href="/products/{{ $products[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $products[0]->title }}</a></h3>
                    <p class="card-text">{{ $products[0]->excerpt }}</p>
                    <h6>Harga : Rp. {{ number_format($products[0]->price, 2, ',', '.') }}</h6>
                    <h6>Kategori produk <a href="/categories/{{ $products[0]->category->slug }}"
                            class="text-decoration-none">{{ $products[0]->category->category_name }}</a>
                    </h6>
                    <p class="card-text"><small
                            class="text-body-secondary">{{ $products[0]->created_at->toFormattedDateString() }}</small></p>

                    <a href="/products/{{ $products[0]->slug }}" class="text-decoration-none btn btn-success">Lihat
                        produk</a>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @auth
                @if (auth()->user()->isAdmin)
                    <a href="/admin/product/create" class="btn btn-primary col-lg-2 mb-3">Create new product</a>
                @else
                @endif
            @else
            @endauth
        </div>
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
            @elseif(session()->has('createTransaction'))
                <div class="alert alert-success col-lg-4 text-center" role="alert">
                    {{ session('createTransaction') }}
                </div>
            @endif
        </div>
    </div>

    <h1 class="title text-center m-5 fs-2">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card rounded-4 mb-3 shadow border-0 overflow-hidden" style="">
                        @if ($product->image)
                            <div style="overflow:hidden; width: auto; max-height: 10em">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                    class="img-fluid rounded-top-4">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $product->category->slug }}"
                                class="card-img-top rounded-top-4" alt="{{ $product->category->category_name }}"
                                style="overflow: hidden; max-height: 10em">
                        @endif

                        <div class="card-body">
                            <button type="category" class="btn btn-success mb-2">
                                <a href="/products?category={{ $product->category->slug }}"
                                    class="text-white text-decoration-none">{{ $product->category->category_name }}</a>
                            </button>
                            <h5 class="card-title text-truncate">{{ $product->title }}</h5>
                            <p class="card-text">Rp.
                                {{ number_format($product->price, 2, ',', '.') }}
                            </p>
                            <p class="card-text">{{ Str::limit($product->excerpt, 65, '...') }}</p>
                            <p class="card-text text-end"><small
                                    class="text-body-secondary text-end">{{ $product->created_at->toFormattedDateString() }}</small>
                            </p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Lihat produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center fs-4">No post found.</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
