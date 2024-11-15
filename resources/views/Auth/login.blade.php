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


        @media (max-width:768px) {
            .container-smm {
                flex-direction: column;
                width: 100%;
                height: 700px;
            }

            .temp-register2 {
                font-size: 20px;
                text-align: center;
                padding: 0;
                border-radius: 0px;
                margin-left: 0px;
            }

            .d-grid {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    @if (Session::has('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-smm">
        <div class="temp-register1">
            <img src="{{ asset('storage/3dboylogin.jpg') }}" alt="3dboy">
        </div>
        <div class="temp-register2">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="text-center fw-bold" style="margin-bottom:35px;">LOGIN</h1>
                <div class="form-group row col-md-10">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control col-md-3" id="username" placeholder="username"
                            name="username" @if (Cookie::has('username')) value="{{ Cookie::get('username') }}" @endif>
                    </div>
                </div>

                <div class="form-group row col-md-10 mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                            name="password">
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="rememberme" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="Login">Login</button>
                    <a href="/register" class="btn btn-primary">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
{{-- coba update github pada tanggal 16/11/2024 --}}
</html>
