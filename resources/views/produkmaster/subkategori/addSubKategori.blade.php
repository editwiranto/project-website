@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/subKategori" style="" class="btn btn-warning mb-3 rounded"><strong style="">&laquo;</strong>
            Kembali</a>
        <form action="{{ route('addSubKategori') }}" method="post">
            @csrf
            <div class="card">
                <h5 class="card-header bg-dark-subtle">+ Tambah Sub Kategori</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori_id" id="" class="form-control">
                                <option value="" selected disabled>--- selected ---</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat['id'] }}">{{ $kat['kategori'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('namaKategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <label for="subKategori" class="col-sm-2 col-form-label">Sub Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="subKategori" name="SubKategori"
                                placeholder="Sub Kategori" value="{{ old('SubKategori') }}">
                        </div>
                    </div>
                    @error('subKategori')
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
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="card-footer bg-dark-subtle">
                    <button class="btn btn-success mx-3 rounded" type="submit">Simpan</button>
                    <a href="/subKategori" class="btn btn-light rounded">Batal</a>
                </div>

            </div>
        </form>
    </div>
@endsection
