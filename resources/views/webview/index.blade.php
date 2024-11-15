<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Test Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .atas {
            color: white;
            background-color: #333333;
        }

        .bawah {
            color: white;
            background-color: #de551f;
        }

        .nav-atas {
            width: 1200px;
            margin: 0 auto;
            font-size: 12px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 40px;

        }

        .nav-atas-kiri {
            margin-left: 10px;
        }

        .nav-atas-kanan {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: underline;
        }

        .nav-bawah {
            max-width: 1200px;
            margin: 0 auto;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
        }

        .nav-bawah ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        li {
            margin-left: 10px;
            margin-right: 10px;
            font-size: 14px;
            list-style-type: none;
        }

        .slider {
            background-color: blue;
            display: flex;
            justify-content: center;
            margin: 20px auto;
            width: 1200px;
            height: 400px;
            position: relative;
            overflow: hidden;
        }

        .slider-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .slides {
            display: flex;
            position: relative;
            transition: transform 0.5s ease;
            /* Smooth transition */
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 10px;
            height: 400px;
            width: 150px;
            font-size: 60px;
            color: rgb(252, 235, 235, 0.3);

        }

        .prev:hover,
        .next:hover {
            color: white;
            background: linear-gradient(rgba(129, 122, 122, 0.1), rgba(163, 163, 165, 0.1));
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .section {
            width: 1200px;
            margin: 0 auto;
        }

        .pagination {
            justify-content: center;
            /* Center the pagination */
        }

        .pagination .page-item .page-link {
            padding: 0.5rem 0.75rem;
            /* Adjust padding */
            font-size: 14px;
            /* Adjust font size */
        }
    </style>
</head>

<body>
    <nav class="atas">
        <div class="nav-atas">
            <div class="nav-atas-kiri">
                <label>Jam Buka Toko : Senin - Minggu 09:00 s/d 20:00 | (0819) 2922 5953 |
                    pandawavapo_plg@gmail.com</label>
            </div>
            <div class="nav-atas-kanan">
                <label><a href="/login">Login</a> &nbsp; | &nbsp; <a href="">Lupa Password</a> &nbsp; | &nbsp;
                    <a href="register">Register</a>
                </label>
            </div>
        </div>
    </nav>
    <nav class="bawah">
        <div class="nav-bawah">
            <div class="bawah-kiri">
                <ul style="display: flex; align-items:center;">
                    <li style="font-size:25px;">Edit Store</li>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>
            <div class="bawah-kanan">
                <ul>
                    <li><a href="">Pesanan</a></li>
                    <li><a href="">Keranjang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- image slider --}}

    <div class="slider">
        <div class="slides">
            @foreach ($image as $image)
                <div class="slide">
                    <img src="{{ asset('storage/' . $image['gambarSlide']) }}" alt="gambar-slider" width="100%"
                        class="slider-image">
                </div>
            @endforeach
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
    <div class="section">
        <div class="card">
            <div class="card-header">
                <label for="">Pencarian Produk</label>
            </div>
            <div class="card-body">
                <form method="get" action="" class="row g-3">
                    <div class="col-md-3">
                        <label for="" style="font-weight: 700">Kategori</label>
                        @error('kategori_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <select name="kategori_id" id="kategori" id="" class="form-control">
                            <option value="" selected disabled>--- Select ---</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="" style="font-weight: 700">Sub Kategori</label>
                        @error('subKategori_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <select id="subkategori" name="subKategori_id" class="form-control">
                            <option value="">Pilih Subkategori</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="" style="font-weight: 700">Search</label>
                        @error('search')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="search" name="search" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="" style="font-weight: 700"></label>
                        <button class="btn btn-outline-primary form-control" type="submit">Search</button>
                    </div>

                </form>
            </div>


        </div>
        <div class="view-search mt-3" id="productList" style="display: flex; justify-content:center;flex-wrap: wrap;">
            @foreach ($produk as $p)
                <div class="slide-content rounded shadow"
                    style="border: 1px solid rgb(207, 203, 203); width: 200px; height: auto; box-sizing: border-box; overflow: hidden; margin-right: 10px; margin-bottom: 10px;">
                    <a href="" style="color:black;text-decoration:none">
                        <img src="{{ asset('storage/' . $p['jumlahFoto']) }}" width="200px" height="200px"
                            alt="" style="padding: 5px;">
                        <p style="padding: 5px;">{{ number_format($p['harga'], 2, ',', '.') }}</p>
                        <p style="padding: 5px; color:red; font-size:16px;">{{ $p['namaproduk'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
    <div class="">
        {{ $produk->links('pagination::bootstrap-4') }}
    </div>
    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const slides = document.querySelector('.slides'); // Fixed selector
            const totalSlides = document.querySelectorAll('.slide').length;

            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }

            slides.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';
        }

        function moveSlide(direction) {
            showSlide(currentIndex + direction);
        }

        // Initialize the slider by showing the first slide
        showSlide(currentIndex);




        //dropdown

        document.getElementById('kategori').addEventListener('change', function() {
            const kategoriId = this.value;
            const subkategoriSelect = document.getElementById('subkategori');
            subkategoriSelect.innerHTML = '<option value="">Pilih Subkategori</option>';

            if (kategoriId) {
                fetch(`/subkategori/${kategoriId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(item => {
                            subkategoriSelect.innerHTML +=
                                `<option value="${item.id}">${item.SubKategori}</option>`;
                        });
                    });
            }
        });
    </script>
</body>

</html>
