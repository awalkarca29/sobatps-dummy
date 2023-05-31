@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Produk dari, {{ Auth::user()->name }}</h1>
        </div>
        <div class="table-responsive col-lg">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td>Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>
                                <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-info"> <span
                                        data-feather="eye" class="align-text-bottom"></span></a>
                                <a href="/dashboard/products/{{ $product->id }}" class="badge bg-warning"> <span
                                        data-feather="edit" class="align-text-bottom"></span></a>
                                <a href="/dashboard/products/{{ $product->id }}" class="badge bg-danger"> <span
                                        data-feather="trash-2" class="align-text-bottom"></span></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
