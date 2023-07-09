@extends('layouts.main')

@section('container')
    @if ($transactions->count())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4">Histori Transaksi</h1>

                    @forelse ($transactions as $transaction)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="transaction-item-header">
                                    <h5 class="mb-1">{{ $transaction->product->title }}</h5>
                                    <span class="text-muted">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="transaction-item-content">
                                    <div class="row">
                                        @if ($transaction->product->image)
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $transaction->product->image) }}"
                                                    alt="Product Image" class="img-fluid">
                                            </div>
                                        @else
                                            <div class="col-lg-4">
                                                <img src="https://source.unsplash.com/1200x800?{{ $transaction->product->category->slug }}"
                                                    alt="Product Image" class="img-fluid">
                                            </div>
                                        @endif
                                        <div class="col-lg-8">
                                            <p>Status : {{ $transaction->status }}</p>
                                            <p>Jumlah : {{ $transaction->quantities }}</p>
                                            <p>Harga : Rp {{ number_format($transaction->price, 0, ',', '.') }}
                                                /Item
                                            </p>
                                            <p>Total Harga : Rp
                                                {{ number_format($transaction->quantities * $transaction->price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada transaksi</p>
                    @endforelse

                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4">Tidak ada catatan transaksi</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $transactions->links() }}
    </div>
@endsection
