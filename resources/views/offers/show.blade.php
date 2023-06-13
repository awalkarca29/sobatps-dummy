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
                @if (auth()->user()->isAdmin)
                    <a href="/purchase" class="btn btn-success mt-3"><i class="bi bi-arrow-left-circle"></i> |
                        Kembali</a>
                @else
                    <a href="/purchase/offers" class="btn btn-success mt-3"><i class="bi bi-arrow-left-circle"></i> |
                        Kembali</a>
                @endif

            </div>
            <div class="col-lg-6 m-auto p-4">
                <div class="card mb-3 border-0 shadow-lg">
                    <div class="card-body">
                        <h4>Detail Tawaran
                        </h4>
                        <h3 class="card-title">{{ $transaction->product->title }}</h3>
                        <button type="category-button"
                            class="btn btn-outline-success p-1"href="/categories/{{ $transaction->product->category->slug }}">
                            {{ $transaction->product->category->category_name }}
                        </button>
                        <h2 class="font-weight-bold">Rp. {{ number_format($transaction->product->price, 2, ',', '.') }}
                        </h2>
                        @if (auth()->user()->isAdmin)
                            <h4 class="font-weight-bold">Ditawar
                                oleh {{ $transaction->buyer->name }}
                            </h4>
                        @else
                        @endif
                        <div class="card mt-3">
                            <div class="card-body">
                                <p class="description">{!! $transaction->product->description !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mb-3 border-0 shadow-lg">
                    <div class="card-body">
                        <h3>Detail Penawaran Produk</h3>
                        <div class="mb-3">
                            <label for="quantities" class="form-label">Jumlah Pembelian</label>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text" id="quantities">@ </span>
                                        <input type="number" class="form-control" placeholder="Jumlah barang"
                                            id="quantities" name="quantities" readonly
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
                            <label for="price" class="form-label">Tawaran Harga</label>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text" id="addon-wrapping">Rp</span>
                                        <input type="number" class="form-control" placeholder="Tawar harga" id="price"
                                            name="price"value="{{ $transaction->price }}" readonly>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span id="price" class="form-text">
                                        / Item
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->isAdmin)
                            <form method="POST" action="/purchase/{{ $transaction->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="d-flex justify-content-around">
                                    <input type="hidden" name="buyer_id" id="buyer_id"
                                        value="{{ $transaction->buyer_id }}">
                                    <input type="hidden" name="seller_id" id="seller_id"
                                        value="{{ $transaction->seller_id }}">
                                    <button type="sumbit" class="btn btn-success p-auto font-weight-bold mt-3"
                                        name="status" id="status" value="accept">Terima
                                        Tawaran</button>
                                    <button type="sumbit" class="btn btn-danger p-auto font-weight-bold mt-3"
                                        name="status" id="status" value="reject">Tolak
                                        Tawaran</button>
                                </div>
                            </form>
                        @else
                            @if ($transaction->status == 'pending')
                                <h4>Tawaranmu <span class="text-warning">menunggu</span> konfirmasi admin, harap tunggu...
                                </h4>
                            @elseif ($transaction->status == 'accept')
                                <h4>Selamat! Tawaranmu <span class="text-success">diterima</span>, silahkan lanjutkan
                                    transaksi</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Lanjutkan Transaksi
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hallo,
                                                    {{ auth()->user()->name }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Karena tawaranmu untuk produk {{ $transaction->product->title }} sudah
                                                diterima, silahkan lanjutkan transaksimu dengan memilih metode dibawah
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex justify-content-between">
                                                    <a href="https://api.whatsapp.com/send?phone=6281586347267"
                                                        target="_blank" class="btn btn-primary">Hubungi Penjual</a>
                                                    <form method="POST" action="/purchase/{{ $transaction->id }}">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="buyer_id" id="buyer_id"
                                                            value="{{ $transaction->buyer_id }}">
                                                        <input type="hidden" name="seller_id" id="seller_id"
                                                            value="{{ $transaction->seller_id }}">
                                                        <button type="sumbit" class="btn btn-success" name="status"
                                                            id="status" value="done">Selesaikan
                                                            Transaksi</button>
                                                        <button type="sumbit" class="btn btn-danger" name="status"
                                                            id="status" value="canceled">Batalkan
                                                            Transaksi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($transaction->status == 'reject')
                                <h4>Maaf, tawaran yang kamu ajukan <span class="text-danger">ditolak</span> admin</h4>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
