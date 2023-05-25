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


{{-- Product::create([
'title' => 'Makanan Kedua',
'user_id' => 1,
'categories' => 'Makanan',
'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
'description' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda commodi corporis accusamus
    voluptate mollitia laborum, fugit animi nihil quod molestias rem maxime magnam cumque consequatur quaerat quos reiciendis sequi ab
    ipsam! Hic accusamus nostrum ad, veritatis doloribus laborum perspiciatis dignissimos architecto, reiciendis, harum quos!
    Facere veritatis id ab obcaecati nemo, voluptate aperiam quidem, ad sed reprehenderit temporibus corrupti ratione
    cumque et quia voluptas commodi. </p><p>Suscipit, impedit. Nostrum illo labore minus adipisci obcaecati aliquam saepe quam et,
    possimus temporibus quas minima perferendis laborum atque. Asperiores placeat tenetur accusantium, necessitatibus
    corporis debitis facere similique tempore? Sapiente, quos minima suscipit sed dolorem in cupiditate tempora eos
    eaque.</p><p> Quo, sint aliquam nesciunt? Minus, totam, quos animi tempore ducimus facilis, possimus sit deserunt similique qui
    dolorem expedita ratione ipsum sed tenetur corporis! Quam et ratione rerum sit obcaecati necessitatibus architecto
    harum. Impedit libero eaque, nulla rem ex voluptatibus? Esse consequatur nobis similique modi architecto laborum.</p>'
'price' => '15000',
'stock' => '50'
]) --}}
