<!-- resources/views/buku/detailGenre.blade.php -->

@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Genre')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Genre</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('genre.index') }}">Daftar Genre</a></li>
                    <li class="breadcrumb-item active">Detail Genre</li>
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
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Genre</th>
                            <td>{{ $genre->idGenre }}</td>
                        </tr>
                        <tr>
                            <th>Nama Genre</th>
                            <td>{{ $genre->nama_genre }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
