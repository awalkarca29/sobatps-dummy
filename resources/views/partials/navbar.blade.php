<nav class="navbar shadow-lg navbar-expand-lg bg-body-tertiary">
    <div class="container" style="">
        <a class="navbar-brand" href="#"><img src="/img/sobat-ps.png" alt="..." height="18"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'products' ? 'active' : '' }}" href="/products">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Kategori</a>
                </li>
            </ul>
            <form class="d-flex me-auto my-2 my-lg-0 navbar-nav-scroll mx-auto w-50" role="search" width="400px">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <img src="/img/MagnifyingGlass.svg" alt="">
            </form>
            <button type="login" class="btn btn-success" type="submit">Login</button>
            <button type="regis" class="btn btn-success mx-2" type="submit">Registrasi</button>
        </div>
    </div>
</nav>
{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container" height="100">
        <a class="navbar-nav" href="/">
            <img src="/img/sobat-ps.png" alt="..." height="18">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'products' ? 'active' : '' }}" href="/products">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Kategori</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item justify-content-end">
                    <div class="mb-3">
                        <button type="login" class="btn btn-success">Login</button>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item justify-content-end">
                    <div class="mb-3">
                        <button type="regis" class="btn btn-success">Registrasi</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}