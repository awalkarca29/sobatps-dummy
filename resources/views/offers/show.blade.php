@extends('layouts.purchase')

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
                            <img src="https://source.unsplash.com/1200x800?{{ $transaction->product->category->category_name }}"
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
                @if ($transaction->product->image)
                    <div style="max-height:20em;" class="rounded-3 mb-lg-0 mb-sm-3">
                        <img src="{{ asset('storage/' . $transaction->product->image) }}"
                            alt="{{ $transaction->product->title }}" class="img-fluid rounded-top">
                    </div>
                @else
                    <div class="rounded-3 mb-lg-0 mb-sm-3">
                        <img src="https://source.unsplash.com/1200x800?{{ $transaction->product->category->slug }}"
                            alt="{{ $transaction->product->title }}" class="img-fluid rounded-top">
                    </div>
                @endif
            </div>
            <div class="col-lg-6 m-auto p-4">
                <div class="card mb-3 border-0 shadow-lg">
                    <div class="card-body">
                        <h2>Detail Tawaran
                        </h2>
                        <h3 class="card-title">{{ $transaction->product->title }}</h3>
                        <button type="category-button"
                            class="btn btn-outline-success p-1 mb-4"href="/categories/{{ $transaction->product->category->slug }}">
                            {{ $transaction->product->category->category_name }}
                        </button>
                        <h2 class="font-weight-bold">Rp. {{ number_format($transaction->product->price, 2, ',', '.') }}
                        </h2>
                        <h4 class="font-weight-bold">Ditawar
                            oleh {{ $transaction->buyer->name }}
                        </h4>
                        <div class="card mt-3">
                            <div class="card-body">
                                <p class="description">{!! $transaction->product->description !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mb-3 border-0 shadow-lg">
                    <div class="card-body">
                        <h3>Detail Pembelian Produk</h3>
                        <div class="mb-3">
                            <label for="quantities" class="form-label">Jumlah Pembelian</label>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text" id="quantities">@ </span>
                                        <input type="number" class="form-control" placeholder="Jumlah barang"
                                            id="quantities" name="quantities" required readonly
                                            value="{{ $transaction->quantities }}">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span id="quantities" class="form-text">Item
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Tawar Harga</label>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text" id="addon-wrapping">Rp</span>
                                        <input type="number" class="form-control" placeholder="Tawar harga" id="price"
                                            name="price" required value="{{ $transaction->price }}" readonly>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span id="price" class="form-text">
                                        / Item
                                    </span>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="/purchase/{{ $transaction->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="d-flex justify-content-around">
                                <input type="hidden" name="buyer_id" id="buyer_id" value="{{ $transaction->buyer_id }}">
                                <input type="hidden" name="seller_id" id="seller_id"
                                    value="{{ $transaction->seller_id }}">
                                <button type="sumbit" class="btn btn-success p-auto font-weight-bold mt-3" name="status"
                                    id="status" value="accept">Terima
                                    Tawaran</button>
                                <button type="sumbit" class="btn btn-danger p-auto font-weight-bold mt-3" name="status"
                                    id="status" value="reject">Tolak
                                    Tawaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
