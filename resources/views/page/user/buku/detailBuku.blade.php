<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>
    </title>
</head>
<body>
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    @if ($buku->gambar_cover)
                    <img
                        class="elevation-3 mx-auto"
                        id="prevImg"
                        src='<?php echo $buku->gambar_cover; ?>'
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
                        <tr>
                            <th>File Buku</th>
                            <td><a href="{{ route('buku.file', $buku->idBuku) }}">Baca Disini</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>