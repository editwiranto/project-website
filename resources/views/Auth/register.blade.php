<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(rgb(212, 205, 205), rgba(167, 171, 175, 0.986));
            background-repeat: no-repeat;
            height: 100vh;
            margin: 200px auto;
            padding: 0;
        }

        /* .container {
            display: flex;
            justify-content: center;
            align-content: center;
            background-color: white;
            border-radius: 10px;
            height: 700px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .temp-register1{
            height: 100%;
            width: 50%;
        }
        .temp-register1 img{
            width: 100%;
            height: 100%;
        }
        .temp-register2{
            height: 100%;
            border-top-left-radius: 40px;
            overflow: hidden;
            border-bottom-left-radius: 40px;
            margin-left: -35px;
            background-color: rgb(223, 31, 31);
            width: 50%
        }
        .content{
            background-color: rgb(92, 53, 53);
            box-sizing: content-box;
            height: 90%;
        } */
        * {
            margin: 0;
            padding: 0;
        }

        .container-smm {
            display: flex;
            justify-content: space-between;
            align-content: center;
            width: 1280px;
            height: 600px;
            margin: 0 auto;
            border-radius: 30px;
            overflow: hidden;
            box-sizing: border-box;
        }

        .temp-register1 {
            width: 100%;
            overflow: hidden;

        }

        .temp-register1 img {
            width: 100%;
            height: 100%;
        }

        .temp-register2 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            width: 100%;
            border-radius: 30px;
            margin-left: -35px;
            background-color: #fff;
        }

        .form-group {
            width: 500px;
            margin-bottom: 15px;
        }

        h1 {
            font-weight: 800;
            letter-spacing: 20px;
            margin-bottom: 20px;
        }

        @media (max-width:768px) {
            .container-smm {
                flex-direction: column;
                height: 100vh;
                width: 100%;
            }
            .temp-register1{
                display: none;
            }
            .temp-register2{
                font-size: 20px;
                text-align: center;
                margin-left: 0px;
            }
        }
    </style>
</head>

<body>
    <marquee behavior="" direction="">
        @error('username')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

        @error('email')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

        @error('password')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @error('password_confirmation')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @error('namalengkap')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @error('telepon')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @error('foto')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @error('biodata')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
    </marquee>
    <h1 class="text-center">REGISTER</h1>

    <div class="container-smm">
        <div class="temp-register1">
            <img src="{{ asset('storage/3dboyregister.jpg') }}" alt="3dboy">
        </div>
        <div class="temp-register2">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="form-class">
                @csrf
                <div class="form-group row col-md-10">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control col-md-3" id="username" placeholder="username"
                            name="username" value="{{ old('username') }}">
                    </div>
                </div>
                <div class="form-group row col-md-10">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            name="email"value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                            name="password">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                            name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namalengkap" placeholder="namalengkap"
                            name="namalengkap" value="{{ old('namalengkap') }}">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telepon" placeholder="telepon" name="telepon"
                            value="{{ old('telepon') }}">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" placeholder="foto" name="foto">
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label for="Biodata" class="col-sm-2 col-form-label">Biodata</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Biodata" placeholder="Biodata"
                            name="biodata" value="{{ old('biodata') }}">
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                    <a class="btn btn-warning" href="/login" name="register">BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
