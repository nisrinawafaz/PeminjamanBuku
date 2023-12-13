<html>
    <head>
    <meta charset="UTF-8" />
    <title>title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a24cb4a13.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap');
    </style>
    <style>
        .text-title {
            font-family: 'Dosis', sans-serif;
            margin-top: 15px;
            font-size: 30px
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .my-flex-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        a:link {
            color: green;
            background-color: transparent;
            text-decoration: none;
        }


        a:hover {
            color: black;
            background-color: transparent;
            text-decoration: bold;
        }

        a:active {
            color: black;
            background-color: transparent;
            text-decoration: underline;
        }

        .button-action a:visited {
            color: green;
            background-color: transparent;
            text-decoration: none;
        }

        .button-green {
            color: white;
            background-color: #198754;
            text-decoration: none;
        }

        .flex-card {
            display: flex;
            flex-direction: column;
            height: 500px;
            justify-content: space-between;
        }

        .sisi {
            padding-top: 80px
        }

        .detail {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: flex;

            flex-direction: row;
            align-items: center;
        }

        .green {
            background-color: #198754;
            height: 100%
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }



        th,
        td {
            padding: 15px;
            text-align: left;
        }

        table {
            border-radius: 10px;
            /* Mengatur radius sudut */
            overflow: hidden;
            /* Menyembunyikan elemen yang melampaui radius */
        }
    </style>
</head>

<body>
    <div class="green sisi">
        <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-scroll">
            <div class="container">
                <!--<ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul>-->
                <a class="navbar-brand" href="#">KOLEKSI KATA</a><!--{{Auth::user()->email}}-->
                <ul class="nav">
                    <!--<li class="nav-item">
                    <a class="nav-link" href="{{route('favorites.index')}}">Favorite</a>
                </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sewa.show', ['id' => Auth::user()->id]) }}">My Book</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </nav>
        <div class="card  detail">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        @if ($buku->gambar_cover)
                        <img class="elevation-3 mx-auto" id="prevImg" src='<?php echo $buku->gambar_cover; ?>'
                            width="200px" style="display: block;" />
                        @else
                        <img class="elevation-3 mx-auto" id="prevImg"
                            src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}" width="300px"
                            style="display: block;" />
                        @endif
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <tr>
                                <th>Judul Buku</th>
                                <td>{{ $buku->judul }}</td>
                            </tr>
                            <tr>
                                <th>Penulis</th>
                                <td>{{ $buku->penulis->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>{{ $buku->tahun_terbit }}</td>
                            </tr>
                            <tr>
                                <th>Genre</th>
                                <td>{{ $buku->genre->nama_genre }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $buku->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>{{ $buku->penerbit->perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $buku->stok }}</td>
                            </tr>
                            <tr>
                                <th>Harga Harian</th>
                                <td>{{ $buku->harga_harian }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>