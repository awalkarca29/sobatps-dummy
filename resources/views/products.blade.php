@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($products as $product)
        <article class="mb-3 border-bottom pb-3">
            <h2>
                <a href="/products/{{ $product->slug }}" class="text-decoration-none">{{ $product->title }}</a>
            </h2>
            <h6>Diproduksi oleh <a href="/producer/{{ $product->user->username }}" class="text-decoration-none">
                    {{ $product->user->name }}
                </a></h6>
            <h6>Kategori produk <a href="/categories/{{ $product->category->slug }}"
                    class="text-decoration-none">{{ $product->category->category_name }}</a>
            </h6>
            <h6>Harga : Rp. {{ number_format($product->price, 2, ',', '.') }}</h6>
            <p>{{ $product->excerpt }}</p>
            <a href="/products/{{ $product->slug }}" class="text-decoration-none">Lihat produk</a>
        </article>
    @endforeach
@endsection
