@extends('layouts.main')

@section('container')
    @if ($notifications->count())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4">Pembaruan Tawaran</h1>

                    @forelse ($notifications as $notification)
                        <div class="card mb-4">
                            <div class="card-body">
                                {{-- <div class="notification-item-header mb-n2">
                                    <p class="text-muted text-end">{{ $notification->updated_at->format('d M Y, H:i') }}
                                    </p>
                                </div> --}}
                                <div class="notification-item-content">
                                    <div class="row">
                                        @if ($notification->product->image)
                                            <div class="col-lg-2">
                                                <div style="width: 8em; height: 5em;">
                                                    <img src="{{ asset('storage/' . $notification->product->image) }}"
                                                        alt="Product Image" class="img-fluid">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-lg-2">
                                                <img src="https://source.unsplash.com/250x140?{{ $notification->product->category->slug }}"
                                                    alt="Product Image" class="img-fluid">
                                            </div>
                                        @endif
                                        <div class="col-lg-8">
                                            @if ($notification->status == 'pending')
                                                <p>Tawaranmu untuk <strong>{{ $notification->product->title }}</strong>
                                                    berhasil diajukan,
                                                    silahkan tunggu penjual untuk merespon
                                                    tawaranmu.
                                                </p>
                                            @elseif ($notification->status == 'accept')
                                                <p>Tawaranmu untuk <strong>{{ $notification->product->title }}</strong>
                                                    disetujui oleh
                                                    penjual! Kamu bisa mendapatkan produk tersebut dengan harga
                                                    <strong>Rp.{{ number_format($notification->price, 2, ',', '.') }}</strong>
                                                    silahkan
                                                    melanjutkan transaksi
                                                </p>
                                            @elseif ($notification->status == 'reject')
                                                <p>Tawaranmu untuk <strong>{{ $notification->product->title }}</strong>
                                                    ditolak oleh penjual,
                                                    silahkan ajukan tawaran terbaikmu!</p>
                                            @elseif ($notification->status == 'done')
                                                <p>Transaksimu untuk <strong>{{ $notification->product->title }}</strong>
                                                    telah selesai.</p>
                                            @endif
                                        </div>
                                        <div class="col-lg mb-auto">
                                            <p class="text-muted text-end">
                                                {{ $notification->updated_at->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada transaksi</p>
                    @endforelse

                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4">Tidak ada catatan transaksi</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $notifications->links() }}
    </div>
    <script>
        function previewImage() {
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection