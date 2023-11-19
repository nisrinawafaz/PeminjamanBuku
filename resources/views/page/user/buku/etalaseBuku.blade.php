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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="grid-all">
            <div>
                <div class="grid-menu" id="content">
                    @if ($buku->isEmpty())
                    <p>Tidak ada buku yang tersedia.</p>
                    @else
                    @foreach($buku as $item)
                    <tr>
                        <div id="{{ $item->idBuku }}" class="card" style="width:250px">
                            <div class="card-body center-item">
                            @if ($item->gambar_cover)
                    <img
                        class="elevation-3 mx-auto"
                        id="prevImg"
                        src='<?php echo $item->gambar_cover; ?>'
                        width="200px"
                        style="display: block;"
                    />
                    @else
                    <img
                        class="elevation-3 mx-auto"
                        id="prevImg"
                        src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                        width="300px"
                        style="display: block;"
                    />
                    @endif
                                <h4 class="card-title" id="nama-${menu.num}">{{ $item->judul }}</h4>
                                <p class="card-text">{{ $item->genre->nama_genre }}</p>
                                <button type="button" class="btn btn-success" id="${menu.num}"
                                    onclick='tambahOrder(this)'>Tambah Barang</button>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>