@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/kategori" style="" class="btn btn-warning mb-3 rounded"><strong style="">&laquo;</strong>
            Kembali</a>
        <form action="{{ route('addKategori') }}" method="post">
            @csrf
            <div class="card">
                <h5 class="card-header bg-dark-subtle">+ Tambah Kategori</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{ old('namaKategori') }}"
                                placeholder="Nama kategori">
                        </div>
                    </div>
                    @error('namaKategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Isi Deskripsi" id="deskripsi" style="height: 100px" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="" class="form-control">
                                <option value="" selected disabled>--- Selected ---</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="card-footer bg-dark-subtle">
                    <button class="btn btn-success mx-3 rounded" type="submit">Simpan</button>
                    <a href="/kategori" class="btn btn-light rounded">Batal</a>
                </div>

            </div>
        </form>
    </div>
@endsection
