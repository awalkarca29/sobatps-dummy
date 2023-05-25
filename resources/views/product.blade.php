@extends('layouts.main')

@section('container')
    <h2>{{ $product->title }}</h2>
    <h6>Kategori Produk : <a href="/categories/{{ $product->category->slug }}"
            class="text-decoration-none">{{ $product->category->category_name }}</a>
    </h6>
    <h6>Diproduksi oleh <a href="/producer/{{ $product->user->username }}" class="text-decoration-none">
            {{ $product->user->name }}
        </a></h6>
    <h6>Rp. {{ $product->price }}</h6>
    {!! $product->description !!}

    <a href="/products" class="d-block mt-2" class="text-decoration-none">Back to Products</a>
@endsection
