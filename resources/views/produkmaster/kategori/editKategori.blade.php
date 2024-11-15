@extends('components.app')
@section('content')
    <div class="container-lg">
        <a href="/kategori" style="" class="btn btn-warning mb-3 rounded"><strong style="">&laquo;</strong>
            Kembali</a>
        <form action="" method="post">
            @csrf
            <input type="hidden" name="id_kategori" value="{{ $kategori['id'] }}">
            <div class="card">
                <h5 class="card-header bg-dark-subtle">+ Edit Kategori</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                                placeholder="Nama kategori" value="{{ $kategori['kategori'] }}" >
                        </div>
                    </div>
                    @error('namaKategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Isi Deskripsi" id="deskripsi" style="height: 100px" name="deskripsi" value="">{{ $kategori['deskripsi'] }}</textarea>
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
                                <option value="Aktif" {{ $kategori['status'] == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ $kategori['status'] == 'Nonaktif' ? 'selected' : '' }} >Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="card-footer bg-dark-subtle">
                    <button class="btn btn-success mx-3 rounded" type="submit">Edit</button>
                    <a href="/kategori/destroy/{{ $kategori['id'] }}" class="btn btn-danger rounded" onclick="return confirm('yakin menghapus ?')">Hapus</a>
                </div>

            </div>
        </form>
    </div>
@endsection
