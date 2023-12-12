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
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tr>
                            <th>Judul Buku</th>
                            <td>{{ $peminjaman->buku->judul }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Minjam</th>
                            <td>{{ $peminjaman -> tgl_peminjaman }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengembalian</th>
                            <td>{{ $peminjaman -> tgl_pengembalian }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>