@extends('layouts.main')

@section('container')
    @if ($transactions->count())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 mt-4 text-success">Riwayat Transaksi</h1>

                    @forelse ($transactions as $transaction)
                        @if ($transaction->status == 'done')
                            <div class="card mb-4 rounded-4 mb-3 shadow border-2 border-success">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($transaction->product->image)
                                                <img src="{{ asset('storage/' . $transaction->product->image) }}"
                                                    alt="Product Image" class="img-fluid w-100 ">
                                            @else
                                                <div class="col-lg-4">
                                                    <img src="https://source.unsplash.com/1200x800?{{ $transaction->product->category->slug }}"
                                                        alt="Product Image" class="img-fluid w-100">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <div class="row mb-1 gy-0 gx-0">
                                                <div class="col-7">
                                                    <div class="transaction-item-header mb-1">
                                                        <h5 class="mb-2">{{ $transaction->product->title }}</h5>
                                                    </div>
                                                    <div class="transaction-item-content">
                                                        <button
                                                            class="btn btn-outline-success py-0 mb-1">{{ $transaction->product->category->category_name }}</button>
                                                        <p class="text-muted mb-0">{{ $transaction->quantities }} items</p>
                                                    </div>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <button
                                                        class="btn btn-success px-3 py-1">{{ $transaction->status }}</button>
                                                    <span
                                                        class="text-muted ml-3">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-9 border border-top-0 border-bottom-0 border-start-0 mb-0 pb-0">
                                                    <p class="mb-0"
                                                        style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 4;">
                                                        {{ $transaction->product->description }}</p>
                                                </div>
                                                <div class="col-3 d-flex flex-column align-self-end">
                                                    {{-- <p>Harga : Rp {{ number_format($transaction->price, 0, ',', '.') }}
                                                    /Item
                                                </p> --}}
                                                    <p class="mb-0">Total Harga: </p>
                                                    <p class="mb-0">Rp
                                                        {{ number_format($transaction->quantities * $transaction->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="card mb-4 rounded-4 mb-3 shadow border-2 border-danger">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($transaction->product->image)
                                                <img src="{{ asset('storage/' . $transaction->product->image) }}"
                                                    alt="Product Image" class="img-fluid w-100 ">
                                            @else
                                                <div class="col-lg-4">
                                                    <img src="https://source.unsplash.com/1200x800?{{ $transaction->product->category->slug }}"
                                                        alt="Product Image" class="img-fluid w-100">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <div class="row mb-1 gy-0 gx-0">
                                                <div class="col-7">
                                                    <div class="transaction-item-header mb-1">
                                                        <h5 class="mb-2">{{ $transaction->product->title }}</h5>
                                                    </div>
                                                    <div class="transaction-item-content">
                                                        <button
                                                            class="btn btn-outline-success py-0 mb-1">{{ $transaction->product->category->category_name }}</button>
                                                        <p class="text-muted mb-0">{{ $transaction->quantities }} items</p>
                                                    </div>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <button
                                                        class="btn btn-danger px-3 py-1">{{ $transaction->status }}</button>
                                                    <span
                                                        class="text-muted ml-3">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-9 border border-top-0 border-bottom-0 border-start-0 mb-0 pb-0">
                                                    <p class="mb-0"
                                                        style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 4;">
                                                        {{ $transaction->product->description }}</p>
                                                </div>
                                                <div class="col-3 d-flex flex-column align-self-end">
                                                    {{-- <p>Harga : Rp {{ number_format($transaction->price, 0, ',', '.') }}
                                                    /Item
                                                </p> --}}
                                                    <p class="mb-0">Total Harga: </p>
                                                    <p class="mb-0">Rp
                                                        {{ number_format($transaction->quantities * $transaction->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endif
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
