<!DOCTYPE html>
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

        .button-action a:visited{
            color: green;
            background-color: transparent;
            text-decoration: none;
        }

        .button-green{
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-scroll">
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul>
            <a class="navbar-brand" href="#">KOLEKSI KATA</a><!--{{Auth::user()->email}}-->
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Favorite</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('sewa.show', ['id' => Auth::user()->id]) }}">My Book</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="input-group rounded " style="width:400px">
        <input type="search" class="form-control rounded  me-2" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class='fas fa-search'></i>
        </span>
    </div>
    <img class="elevation-3 mx-auto" style="width:100%" id="prevImg"
                            src='{{ asset('storage/admin/image/book.png') }}' style="display: block;" />
    <div class="grid-container">
        @if ($buku->isEmpty())
        <p>Tidak ada buku yang tersedia.</p>
        @else
        @foreach($buku as $item)
        <div id="{{ $item->idBuku }}" class="card">
            <div>
                @if ($item->gambar_cover)
                <img class="elevation-3 mx-auto" style="width:200px" id="prevImg" src='{{ asset($item->gambar_cover) }}'
                    style="display: block;" />

                @else
                <img class="elevation-3 mx-auto" id="prevImg" src="{{ asset('storage/admin/cover_buku/boxed-bg.jpg') }}"
                    width="300px" style="display: block;" />
                @endif

                <h4 class="text-title" id="judul">'{{ $item->judul }}'</h4>
                <p class="card-text">{{ $item->genre->nama_genre }}</p>
                <p class="card-text">{{$item->harga_harian }}</p>
            </div>
            <div class="">
            <a href="{{ route('sewa.cart', ['id' => $item->idBuku]) }}" class="btn btn-success" >Sewa</a>
            <button href="{{ route('etalaseBuku.detail', ['idBuku' => $item->idBuku]) }}"  class="button-green btn" ><i class="fa-regular fa-heart"></i></button>
            <button onclick="window.location.href='{{ route('etalaseBuku.detail', ['idBuku' => $item->idBuku]) }}'" class="button-green btn">
  <i class="fa-solid fa-circle-info"></i>
</button>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</body>

</html>