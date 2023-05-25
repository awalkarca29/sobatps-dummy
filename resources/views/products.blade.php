@extends('layouts.main')

@section('container')
    <h1 class="mb-4">{{ $title }}</h1>

    @if ($products->count())
        <div class="card mb-3 text-center">
            <img src="https://source.unsplash.com/1200x400?{{ $products[0]->category->category_name }}" class="card-img-top"
                alt="{{ $products[0]->category->category_name }}">
            <div class="card-body">
                <h3 class="card-title"><a href="/products/{{ $products[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $products[0]->title }}</a></h3>
                <p class="card-text">{{ $products[0]->excerpt }}</p>
                <h6>Harga : Rp. {{ number_format($products[0]->price, 2, ',', '.') }}</h6>
                <h6>Kategori produk <a href="/categories/{{ $products[0]->category->slug }}"
                        class="text-decoration-none">{{ $products[0]->category->category_name }}</a>
                </h6>
                <p class="card-text"><small
                        class="text-body-secondary">{{ $products[0]->created_at->toFormattedDateString() }}</small></p>

                <a href="/products/{{ $products[0]->slug }}" class="text-decoration-none btn btn-success">Lihat produk</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif


    <div class="container">
        <div class="row">
            @foreach ($products->skip(1) as $product)
                <div class="col-md-4 mb-3">
                    <div class="card" style="">
                        <div class="position-absolute px-2 py-1 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                            <a href="/categories/{{ $product->category->slug }}"
                                class="text-white text-decoration-none">{{ $product->category->category_name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x400?{{ $product->category->category_name }}"
                            class="card-img-top" alt="{{ $product->category->category_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">Rp. {{ number_format($products[0]->price, 2, ',', '.') }}</p>
                            <p class="card-text">{{ $product->excerpt }}</p>
                            <p class="card-text"><small
                                    class="text-body-secondary">{{ $products[0]->created_at->toFormattedDateString() }}</small>
                            </p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Lihat produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
