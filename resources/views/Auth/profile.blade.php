@extends('components.app')
@section('stylecss')
    .bungkus{
    display:flex;
    height:700px;
    }

    .container-tengah{
    width:1400px;
    margin:0 auto;
    }

    .gambar-profile{
    display:flex;
    flex-direction:column;
    align-items:center;
    width:40%;
    margin-left:85px;
    margin-right:30px;
    }

    .data{
    width:100%;
    }

    .form-class {
    width: 90%;
    height:670px;
    border-radius: 5px;
    display:flex;
    justify-content:space-between;
    flex-direction:column;
    align-items:center;
    }
@endsection
@section('content')
    @if (Session::has('success'))
        <span class="alert alert-danger">{{ session('success') }}</span>
    @endif
    @if (Session::has('fail'))
        <span class="alert alert-danger">{{ session('fail') }}</span>
    @endif
    <div class="container-tengah shadow bg-white">
        <div class="card-header">
            <h1 class="text-center fw-bolder" style="letter-spacing: 50px;font-size:40px;">PROFILE</h1>
        </div>


        <div class="bungkus my-3">
            <div class="card gambar-profile bg-light py-3">
                <img src="{{ Storage::url($profile->foto) }}" class="rounded-circle" alt="gambar Profile" width="300px"
                    height="300px">
                <h3 class="text-center my-4 fw-bold">{{ Str::upper($profile->namalengkap) }}</h3>
            </div>
            <div class="data">
                <div class="temp-register2">
                    <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data"
                        class="form-class bg-light shadow py-3">
                        @csrf
                        <div class="form-group row col-md-12">
                            <label for="username" class="col-sm-2 col-form-label label-spacing">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-md-3" id="username" placeholder="username"
                                    disabled name="username" value="{{ $profile->username }}">
                            </div>
                        </div>
                        @error('username')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email" disabled
                                    name="email" value="{{ $profile->email }}">
                            </div>
                        </div>
                        @error('email')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                    name="password" value="{{ $profile->password }}">
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="inputPassword3" class="col-sm-2 col-form-label ">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                    name="password_confirmation" value="{{ $profile->password }}">
                            </div>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namalengkap" placeholder="namalengkap"
                                    name="namalengkap" value="{{ $profile->namalengkap }}">
                            </div>
                        </div>
                        @error('namalengkap')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="telepon" placeholder="telepon"
                                    name="telepon" value="{{ $profile->telepon }}">
                            </div>
                        </div>
                        @error('telepon')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto" placeholder="foto" name="foto">
                            </div>
                        </div>
                        @error('foto')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="form-group row col-md-12">
                            <label for="Biodata" class="col-sm-2 col-form-label">Biodata</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Biodata" placeholder="Biodata"
                                    name="biodata" value="{{ $profile->biodata }}">
                            </div>
                        </div>
                        @error('biodata')
                            <span class="text-danger"></span>
                        @enderror
                        <div class="d-grid gap-2 col-8 mx-auto">
                            <button class="btn btn-primary" type="submit" name="">Update</button>
                            <a class="btn btn-warning" href="/login" name="register">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
