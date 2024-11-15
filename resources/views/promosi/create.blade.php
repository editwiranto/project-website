@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/promosi/banner-slider" style="" class="btn btn-warning mb-3 rounded"><strong
                style="">&laquo;</strong>
            Kembali</a>
        <form action="{{ route('addSlider') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h5 class="card-header bg-dark-subtle">+ Tambah Sub Kategori</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="judulslide" class="col-sm-2 col-form-label">Judul slide</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judulslide" name="judulSlide">
                        </div>
                    </div>
                    @error('judulSlide')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row mb-3">
                        <label for="captionSlide" class="col-sm-2 col-form-label">Caption Slide</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="captionSlide" name="captionSlide">
                        </div>
                    </div>
                    @error('captionSlide')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row mb-3">
                        <label for="gambarSlide" class="col-sm-2 col-form-label">Gambar Slide</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambarSlide" name="gambarSlide">
                        </div>
                    </div>
                    @error('gambarSlide')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="card-footer bg-dark-subtle">
                        <button class="btn btn-success mx-3 rounded" type="submit">Simpan</button>
                    </div>
        </form>
    </div>
@endsection
