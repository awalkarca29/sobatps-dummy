<div class="col-lg">
    <form method="POST" action="/dashboard/products" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label @error('title') is-invalid @enderror">Title</label>
            <input type="text" class="form-control" id="title" name="title" required autofocus
                value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required
                value="{{ old('slug') }}" readonly>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label @error('price') is-invalid @enderror">Price</label>
            <input type="number" class="form-control" id="price" name="price" required
                value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label @error('stock') is-invalid @enderror">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required
                value="{{ old('stock') }}">
            @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Slug</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            {{-- Preview Image #1 --}}
            <img src="" class="img-preview img-fluid mb-3 col-sm-6" id="imagePreview" style="display:block">

            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                name="image" onchange="previewImage()">
            {{-- Preview Image #2 --}}
            {{-- <img class="img-preview img-fluid mb-3 col-sm-5"> --}}
            {{-- <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                name="image" onchange="previewImage()"> --}}
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" required value="{{ old('description') }}">
            <trix-editor input="description"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Buat produk</button>
    </form>
</div>
