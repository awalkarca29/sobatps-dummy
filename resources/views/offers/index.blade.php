@extends('layouts.main')

@section('container')
    <h1 class="title text-center m-5 fs-2">{{ $title }}</h1>
    <div class="container">
        @if ($transactions->count())
            <div class="row">
                @foreach ($transactions as $transaction)
                    <div class="col-md-3 mb-3">
                        <div class="card rounded-4 mb-3 shadow border-0 overflow-hidden" style="">
                            @if ($transaction->product->image)
                                <div style="overflow:hidden; width: auto; max-height: 10em">
                                    <img src="{{ asset('storage/' . $transaction->product->image) }}"
                                        alt="{{ $transaction->product->title }}" class="img-fluid rounded-top-4">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $transaction->product->category->slug }}"
                                    class="card-img-top rounded-top-4"
                                    alt="{{ $transaction->product->category->category_name }}"
                                    style="overflow: hidden; max-height: 10em">
                            @endif

                            <div class="card-body">
                                <button type="category" class="btn btn-success mb-2">
                                    <a href="/products?category={{ $transaction->product->category->slug }}"
                                        class="text-white text-decoration-none">{{ $transaction->product->category->category_name }}</a>
                                </button>
                                <h5 class="card-title text-truncate">{{ $transaction->product->title }}</h5>
                                <p class="card-text">Ditawar Rp.
                                    {{ number_format($transaction->price, 2, ',', '.') }}
                                </p>
                                <p class="card-text">Jumlah beli {{ $transaction->quantities }} item</p>
                                <p class="card-text">Ditawar oleh {{ $transaction->buyer->name }}</p>
                                <p class="card-text text-end"><small
                                        class="text-body-secondary text-end">{{ $transaction->updated_at->toFormattedDateString() }}</small>
                                </p>
                                <a href="/products/{{ $transaction->product->slug }}" class="btn btn-primary">Lihat
                                    produk</a>
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
        {{ $transactions->links() }}
    </div>
@endsection
