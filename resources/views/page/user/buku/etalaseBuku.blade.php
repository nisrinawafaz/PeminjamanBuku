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
    <style>
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
    </style>
</head>


<body>
    <div class="container-fluid">
        <div class="grid-container">
            @if ($buku->isEmpty())
            <p>Tidak ada buku yang tersedia.</p>
            @else
            @foreach($buku as $item)
            <div id="{{ $item->idBuku }}" class="card">
                <div class="my-flex-container">
                    <div>
                    @if ($item->gambar_cover)
                    <img class="elevation-3 mx-auto" style="width:200px" id="prevImg"
                        src='{{ asset($item->gambar_cover) }}' style="display: block;" />

                    @else
                    <img class="elevation-3 mx-auto" id="prevImg"
                        src="{{ asset('storage/admin/cover_buku/boxed-bg.jpg') }}" width="300px"
                        style="display: block;" />
                    @endif
                    </div>
                    <div>
                    <h4 class="card-title" id="nama-${menu.num}">{{ $item->judul }}</h4>
                    <p class="card-text">{{ $item->genre->nama_genre }}</p>
                    <button type="button" class="btn btn-success" id="${menu.num}" onclick='tambahOrder(this)'>Tambah
                        Barang</button>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</body>

</html>