@extends('layouts.main')

@section('container')
    <div class="container-fluid w-100 p-0">
        <div class="card border-0 w-100 align-items-center mb-5">
            <div class="bg-image hover-overlay w-100">
                <img src="/img/hutancemara.png" class="w-100">
                <div class="mask"
                    style="background: linear-gradient(45deg, hsla(168, 85%, 52%, 0.5), hsla(263, 88%, 45%, 0.5) 100%);">
                </div>
            </div>
            <div class="card-img-overlay d-flex align-items-center pl-5 w-100">
                <div class="row">
                    <div class="col-12">
                        <h1 class="card-title text-white">Mengelola Hasil
                        </h1>
                    </div>
                    <div class="col-12">
                        <h1 class="card-title text-white">Hutan Jadi Lebih Mudah
                        </h1>
                    </div>
                    <div class="col-12">
                        <h6 class="card-title text-white">Selamat datang di Website Sobat PS EBussiness,
                        </h6>
                    </div>
                    <div class="col-12">
                        <h6 class="card-title text-white">Semua kebutuhanmu terkait hasil ada disini!
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-center mt-3">Beberapa kategori yang kami sajikan</h1>
        <h1 class="text-center mb-5">untuk kebutuhan anda!</h1>
        <div class="row">
            <div class="col-6 d-flex justify-content-end">
                <div class="p-0 g-0 d-flex justify-content-center align-items-center border-0" style="width: 30rem;">
                    <img class="card-img-top text-white p-0" src="/img/hhk.png" alt="Hasil Hutan Kayu">
                    <h1 class="text-center position-absolute text-white">Hasil Hutan Kayu</h1>
                </div>
            </div>
            <div class="col-6">
                <div class="p-0 g-0 d-flex justify-content-center align-items-center border-0" style="width: 30rem;">
                    <img class="card-img-top p-0 " src="/img/hhkb.png" alt="Card image cap">
                    <h1 class="text-center position-absolute text-white">Hasil Hutan Bukan Kayu</h1>
                </div>
            </div>
        </div>


        <div class=""></div>


        <div class="container-fluid w-80 pt-5 pb-5" id="kotak" style="">
            <div class="text pt-5 mt-5 mb-5">
                <h2 class="text-center text-white pt-5 mt-5">Apasih SOBAT-PS</h2>
                <h2 class="text-center text-white">E-Bussines itu?</h2>
            </div>
            <div class="row mb-5 pt-3">
                <div class="col-6 d-flex justify-content-end">
                    <div class="p-0 g-0 d-flex justify-content-center align-items-center border-0" style="width: 30rem;">
                        <img class="card-img-top text-white p-0" src="/img/kotak.png" alt="Hasil Hutan Kayu">
                        <h1 class="text-center position-absolute text-white">Hasil Hutan Kayu</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-transparent" style="width: 30rem">
                        <div class="card-body text-white">
                            <h4 class="card-title mb-3">Membantu 3500++ UMKM untuk memasarkan produknya melalui aplikasi
                                kami
                            </h4>
                            <h5 class="card-subtitle mb-2 ">Membantu 3500++ UMKM untuk memasarkan produknya
                                melalui aplikasi kami</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-5 mt-3">
                <div class="col-6 d-flex justify-content-end">
                    <div class="p-0 g-0 d-flex justify-content-center align-items-center border-0" style="width: 30rem;">
                        <img class="card-img-top text-white p-0" src="/img/kotak.png" alt="Hasil Hutan Kayu">
                        <h1 class="text-center position-absolute text-white">Hasil Hutan Kayu</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-transparent" style="width: 30rem;">
                        <div class="card-body text-white">
                            <h4 class="card-title mb-3">Membantu 3500++ UMKM untuk memasarkan produknya melalui
                                aplikasi kami
                            </h4>
                            <h5 class="card-subtitle mb-2">Membantu 3500++ UMKM untuk memasarkan produknya
                                melalui aplikasi kami</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-center mt-5">Kenapa harus menggunakan</h1>
        <h1 class="text-center mb-5">SOBAT-<span class="text-success">PS</span> E-Bussines</h1>

        <h4 class="text-center" style="color: #959595">Masih ragu pake aplikasi ini sobat?</h4>
        <h4 class="text-center mb-5" style="color: #959595">ini nih keunggulan yang kami punya!</h4>

        <div class="container d-flex flex-row mb-5 justify-content-around">
            <div class="card border-0" style="width: 12rem;">
                <img class="card-img-top" src="/img/klik.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">Tinggal</h4>
                    <h4 class="text-center text-success">Klik!</h4>
                </div>
            </div>
            <div class="card border-0" style="width: 12rem;">
                <img class="card-img-top" src="/img/aman.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">Barang pasti</h4>
                    <h4 class="text-center text-success">aman deh!</h4>
                </div>
            </div>
            <div class="card border-0" style="width: 12rem;">
                <img class="card-img-top" src="/img/bayar.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">Gak repot</h4>
                    <h4 class="text-center text-success">Bayar Bayar!</h4>
                </div>
            </div>
            <div class="card border-0" style="width: 12rem;">
                <img class="card-img-top" src="/img/akses.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">Bisa akses</h4>
                    <h4 class="text-center text-success">darimanapun!</h4>
                </div>
            </div>
            <div class="card border-0" style="width: 12rem;">
                <img class="card-img-top" src="/img/shopping.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">Udah Siap</h4>
                    <h4 class="text-center text-success">Belanja?</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h1>Frequently</h1>
                    <h1>Asked Question></h1>
                </div>
                <div class="col-lg-8">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection
