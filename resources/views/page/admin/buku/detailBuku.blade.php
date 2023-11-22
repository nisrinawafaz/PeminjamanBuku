<!-- resources/views/buku/detail.blade.php -->

@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Buku')

@section('content')
<section class "content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Daftar Buku</a></li>
                    <li class="breadcrumb-item active">Detail Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
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
</section>
@endsection
