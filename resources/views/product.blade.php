@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $product->title }}</h2>
                <img src="https://source.unsplash.com/1200x400?{{ $product->category->category_name }}"
                    alt="{{ $product->title }}" class="img-fluid">
                <h6 class="mt-3">Kategori Produk : <a href="/categories/{{ $product->category->slug }}"
                        class="text-decoration-none">{{ $product->category->category_name }}</a>
                </h6>
                <h6>Diproduksi oleh <a href="/producer/{{ $product->user->username }}" class="text-decoration-none">
                        {{ $product->user->name }}
                    </a></h6>
                <h6>Rp. {{ $product->price }}</h6>
                {!! $product->description !!}

                <a href="/products" class="d-block mt-2" class="text-decoration-none">Back to Products</a>
            </div>
        </div>
    </div>
@endsection
