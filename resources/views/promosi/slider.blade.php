@extends('components.app')
@section('stylecss')
    .card-body{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    }
    ul{
    list-style-type:none;
    margin:0;
    padding:0;
    display:grid;
    place-items:center;
    }
@endsection
@section('content')
    @if (Session::has('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if (Session::has('fail'))
        <span class="alert alert-danger">{{ session('fail') }}</span>
    @endif
    <div class="container">
        <div class="text-end mb-3">
            <a href="/promosi/addsliderview" class="btn mb-3" style="background-color: #337ab7;color:white;"><strong>+</strong>
                TAMBAH DATA</a>
        </div>


        <div class="card">
            <h5 class="card-header bg-dark-subtle">Banner Slider</h5>
            <div class="card-body">
                @foreach ($slider as $s)
                    <ul>
                        <li><img src="{{ asset('storage/' . $s['gambarSlide']) }}" alt="" width="483px"
                                height="167px"></li>
                        <li>
                            <h3>{{ $s['judulSlide'] }}</h3>
                        </li>
                        <li style="color: lightgrey;">{{ $s['created_at'] }}</li>
                        <li>{{ $s['captionSlide'] }}</li>
                        <li><a href="/promosi/edit/{{ $s['id'] }}" class="btn btn-warning">Update</a>
                            <a href="/promosi/destroy/{{ $s['id'] }}"
                                class="btn btn-danger mx-3" onclick="return confirm('hapus ?')">Hapus</a></li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
