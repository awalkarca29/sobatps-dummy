@extends('layouts.main')

@section('container')
    <div class="container">
        <h1 class="title text-center m-3 fs-2">{{ $title }}</h1>
        <form action="/purchase/offers" method="GET">
            @csrf
            <div class="row">
                <label for="searchStatus" class="form-labe mb-n5">Cari Status Tawaranmu</label>
                <div class="col-lg-4 d-flex justify-content-start align-items-center p-2">
                    <select class="form-select w-auto rounded-start" name="statusFilter">
                        <option value="">Semua Tawaran</option>
                        <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accept" {{ $selectedStatus == 'accept' ? 'selected' : '' }}>Diterima</option>
                        <option value="reject" {{ $selectedStatus == 'reject' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <button class="btn btn-success rounded-end" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        @if (session()->has('successUpdate'))
            <div class="alert alert-success col-lg-4 mx-auto text-center" role="alert">
                {{ session('successUpdate') }}
            </div>
        @endif
    </div>
    <div class="container mt-3">
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
                                <p class="card-text">Penawaran Rp.
                                    {{ number_format($transaction->price, 2, ',', '.') }}
                                </p>
                                <p class="card-text">Jumlah beli {{ $transaction->quantities }} item</p>
                                @if ($transaction->status == 'pending')
                                    <p class="card-text">Tawaran <span class="text-warning">Menunggu</span></p>
                                @elseif ($transaction->status == 'accept')
                                    <p class="card-text">Tawaran <span class="text-success">Diterima</span></p>
                                @elseif ($transaction->status == 'reject')
                                    <p class="card-text">Tawaran <span class="text-danger">Ditolak</span></p>
                                @endif
                                {{-- <p class="card-text">Status Tawaran {{ $transaction->status }}</p> --}}
                                <p class="card-text text-end"><small
                                        class="text-body-secondary text-end">{{ $transaction->updated_at->toFormattedDateString() }}</small>
                                </p>
                                <a href="/purchase/{{ $transaction->id }}" class="btn btn-primary">Lihat
                                    Tawaran</a>
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
