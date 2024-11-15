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
            <a href="/produk/addProduk" class="btn mb-3" style="background-color: #337ab7;color:white;"><strong>+</strong>
                TAMBAH DATA</a>
        </div>


        <div class="card">
            <h5 class="card-header bg-dark-subtle">Sub Kategori</h5>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Jumlah Foto</th>
                            <th>Tgl Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                            <tr>
                                <td> <a href="/produk/editProduk/{{ $p['id'] }}">{{ $p['namaproduk'] }}</a></td>
                                <td>{{ $p['harga'] }}</td>
                                <td>
                                    {{ $p->kategori->kategori }}
                                </td>
                                <td>
                                    {{ $p->SubKategori->SubKategori }}
                                </td>
                                <td>

                                    @php
                                        $jumlahFoto = explode('|', $p['jumlahFoto']);
                                        $totalFoto = count($jumlahFoto);
                                    @endphp
                                    {{ $totalFoto }}
                                </td>
                                <td>
                                    <span class="{{ trim($p['status']) == 'Aktif' ? 'bg-success' : 'bg-danger' }}"
                                        style="padding: 5px;color:white;">
                                        {{ $p['status'] }}
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
