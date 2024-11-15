@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/produk" style="" class="btn btn-warning mb-3 rounded"><strong style="">&laquo;</strong>
            Kembali</a>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <input type="hidden" name="produk_id" value="{{ $editProduk['id'] }}">
                <div class=" card-header card-header-addproduk bg-dark-subtle">
                    <h5 class="">+ Edit Produk</h5>
                    <div class="text-center addProdukStatus">
                        <select name="status" id="" class="form-control addProdukStatusInput">
                            <option value="" selected disabled>--- Select ---</option>
                            <option value="Aktif" {{ $editProduk['status'] == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Nonaktif" {{ $editProduk['status'] == 'Nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="card-body">
                    <div class="baris-pertama" style="">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" style="font-weight: 700">Kategori</label>

                                <select name="kategori_id" id="kategori" class="form-control">
                                    <option value="" selected disabled>--- Select ---</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}"
                                            {{ $kat['id'] == $editProduk['kategori_id'] ? ' selected' : '' }}>
                                            {{ $kat->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kategori_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col">
                                <label for="" style="font-weight: 700">Sub Kategori</label>
                                @error('subKategori_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select id="subkategori" name="subKategori_id" class="form-control">
                                    <option value="">Pilih Subkategori</option>
                                </select>
                            </div>
                            @error('subKategori_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-sm-5">
                                <label for="" style="font-weight: 700">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-text">RP</div>
                                    <input type="number" class="form-control" id="autoSizingInputGroup" placeholder="Harga"
                                        name="harga" value="{{ $editProduk['harga'] }}">
                                </div>
                            </div>
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row g-3" style="">
                            <div class="col-sm-7">
                                <label for="" style="font-weight: 700">Nama produk</label>
                                @error('namaProduk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" placeholder="Nama Produk" name="namaProduk"
                                    value="{{ $editProduk['namaproduk'] }}">
                            </div>
                            <div class="col">
                                <label for="" style="font-weight: 700">Berat Produk</label>
                                <input type="number" class="form-control" placeholder="Berat Produk" name="berat"
                                    value="{{ $editProduk['berat'] }}">
                            </div>
                            @error('berat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10">{{ $editProduk['deskripsi'] }}</textarea>
                            </div>
                            @error('deskripsi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" style="font-weight: 700">Foto Produk</label>
                                <input type="file" class="form-control" name="jumlahFoto[]" multiple>

                                @if ($editProduk['jumlahFoto'])
                                    @php
                                        $gambar = explode('|', $editProduk['jumlahFoto']);
                                    @endphp
                                    <div class="mt-2">
                                        <strong>Gambar yang sudah ada:</strong>
                                        <div class="row">
                                            @foreach ($gambar as $img)
                                                <div class="image-preview">
                                                    <img src="{{ asset('storage/' . $img) }}" class="img-thumbnail"
                                                        alt="Gambar Produk" width="50px" height="50px">

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @error('jumlahFoto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="card-footer bg-dark-subtle">
                        <button class="btn btn-success mx-3 rounded" type="submit">Simpan</button>
                        <a href="/produk/destroy/{{ $editProduk['id'] }}" class="btn btn-light rounded"
                            onclick="return confirm('Hapus ?')">Hapus</a>
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
     {{-- <option value="{{ $kategori['id'] }}" {{ $kategori['id'] == $editProduk['SubKategori_id'] ? 'selected' : '' }}> --}}
    <script>
        $(document).ready(function() {
            var selectedSubKategoriId = '{{ $editProduk['SubKategori_id'] }}';

            $('#kategori').change(function() {
                var kategoriId = $(this).val();
                $('#subkategori').empty().append('<option value="">Pilih Subkategori</option>');

                if (kategoriId) {
                    $.get(`/subkategori/${kategoriId}`, function(data) {
                        $.each(data, function(key, value) {
                            var isSelected = (value.id == selectedSubKategoriId) ?
                                ' selected' : '';

                            $('#subkategori').append('<option value="' + value.id + '"' +
                                isSelected + '>' + value.SubKategori + '</option>');
                        });
                    });
                }
            });

            // Trigger change on page load if kategori is already selected
            if ($('#kategori').val()) {
                $('#kategori').trigger('change');
            }
        });
    </script>
@endsection
