<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a24cb4a13.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="grid-container">
        @if ($peminjaman->isEmpty())
        <p>Tidak ada buku yang tersedia.</p>
        @else
        @foreach($peminjaman as $item)
        <div id="{{ $item->idBuku }}" class="card">
            <div>
                <h4 class="text-title" id="judul">'{{ $item->buku->judul }}'</h4>
                <p class="card-text">{{ $item->tgl_peminjaman }}</p>
                <p class="card-text">{{$item->tgl_pengembalian }}</p>
            </div>
            <div class="">
                <a href="{{ route('sewa.detail', ['id' => $item->idPeminjaman]) }}" class="btn btn-success">Detail</a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</body>

</html>