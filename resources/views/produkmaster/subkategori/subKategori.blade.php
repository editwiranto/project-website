@extends('components.app')
@section('content')
    @if (Session::has('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if (Session::has('fail'))
        <span class="alert alert-danger">{{ session('fail') }}</span>
    @endif
    <div class="container">
        <div class="text-end mb-3">
            <a href="/subKategori/addSubKategori" class="btn mb-3"
                style="background-color: #337ab7;color:white;"><strong>+</strong>
                TAMBAH DATA</a>
        </div>


        <div class="card">
            <h5 class="card-header bg-dark-subtle">Sub Kategori</h5>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @foreach ($subKategori as $subkat)
                        <tr>
                            <td>{{ $subkat->Kategori->kategori }}</td>
                            <td><a href="/subKategori/editSubKategori/{{ $subkat['id'] }}">{{ $subkat['SubKategori'] }}</a>
                            </td>
                            <td>{{ $subkat['deskripsi'] }}</td>
                            <td>
                                <span class="{{ trim($subkat['status']) == 'Aktif' ? 'bg-success' : 'bg-danger' }}"
                                    style="padding: 5px;color:white;">
                                    {{ $subkat['status'] }}
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
