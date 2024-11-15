@extends('components.app')
@section('content')
    <div class="container">
    <div class="text-end my-3">
        <a href="/kategori/addKategori" class="btn mb-3" style="background-color: #337ab7;color:white;"><strong>+</strong>
            TAMBAH DATA</a>
    </div>
    @if (Session::has('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if (Session::has('fail'))
        <span class="alert alert-danger">{{ session('fail') }}</span>
    @endif

        <div class="card">
            <h5 class="card-header bg-dark-subtle">Kategori</h5>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kat)
                            <tr>
                                <td><a href="/kategori/editKategori/{{ $kat['id'] }}">{{ $kat['kategori'] }}</a></td>
                                <td>{{ $kat['deskripsi'] }}</td>
                                <td>
                                    <span class="{{ trim($kat['status']) == 'Aktif' ? 'bg-success' : 'bg-danger' }}"
                                        style="padding: 5px;color:white;">
                                        {{ $kat['status'] }}
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
