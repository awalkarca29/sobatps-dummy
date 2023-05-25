@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Kategori Produk Kami</h1>

    @foreach ($categories as $category)
        <ul>
            <li>
                <h2><a href="/categories/{{ $category->slug }}">{{ $category->category_name }}</a></h2>

            </li>
        </ul>
    @endforeach
@endsection
