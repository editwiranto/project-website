@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/produk" style="" class="btn btn-warning mb-3 rounded"><strong style="">&laquo;</strong>
            Kembali</a>
        <form action="{{ route('addProduk') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class=" card-header card-header-addproduk bg-dark-subtle">
                    <h5 class="">+ Tambah Produk</h5>
                    <div class="text-center addProdukStatus">
                        <select name="status" id="" class="form-control addProdukStatusInput">
                            <option value="" selected disabled>--- Select ---</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="baris-pertama" style="">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" style="font-weight: 700">Kategori</label>
                                @error('kategori_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select name="kategori_id" id="kategori" id="" class="form-control">
                                    <option value="" selected disabled>--- Select ---</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="" style="font-weight: 700">Sub Kategori</label>
                                @error('subKategori_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select id="subkategori" name="subKategori_id" class="form-control">
                                    <option value="">Pilih Subkategori</option>
                                </select>
                            </div>

                            <div class="col-sm-5">
                                <label for="" style="font-weight: 700">Harga</label>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-group">
                                    <div class="input-group-text">RP</div>
                                    <input type="number" class="form-control" id="autoSizingInputGroup" placeholder="Harga"
                                        name="harga" value="{{ old('harga') }}">
                                </div>
                            </div>

                        </div>

                        <div class="row g-3">
                            <div class="col-sm-7">
                                <label for="" style="font-weight: 700">Nama produk</label>
                                @error('namaProduk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" placeholder="Nama Produk" name="namaProduk"
                                    value="{{ old('namaProduk') }}">
                            </div>

                            <div class="col">
                                <label for="" style="font-weight: 700">Berat Produk</label>
                                @error('berat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="number" class="form-control" placeholder="Berat Produk" name="berat"
                                    value="{{ old('berat') }}">
                            </div>

                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="control-label">Deskripsi</label>
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10">{{ old('deskripsi') }}</textarea>
                            </div>

                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <label for="" style="font-weight: 700">Foto Produk</label>

                                <input type="file" class="form-control" placeholder="First name" aria-label="First name"
                                    name="jumlahFoto[]" multiple>
                            </div>
                        </div>
                        @error('jumlahFoto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer bg-dark-subtle">
                    <button class="btn btn-success mx-3 rounded" type="submit">Simpan</button>
                    <a href="/produk" class="btn btn-light rounded">Batal</a>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('script')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <script>
        new DataTable('#example');

        $(document).ready(function() {
            $('#deskripsi').summernote({
                placeholder: 'Silahkan Masukkan Deskripsi Produk',
                tabsize: 2,
                height: 300
            });
        });
    </script>
    <script>
        $('#kategori').change(function() {
            var kategoriId = $(this).val();

            $('#subkategori').empty().append('<option value="">Pilih Subkategori</option>');

            if (kategoriId) {
                $.get(`/subkategori/${kategoriId}`, function(data) {
                    $.each(data, function(key, value) {
                        $('#subkategori').append('<option value="' + value.id + '">' + value
                            .SubKategori + '</option>');
                    });
                });
            }
        });
    </script>
@endsection
