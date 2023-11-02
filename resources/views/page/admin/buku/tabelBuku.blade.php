@extends('layouts.base_admin.base_dashboard')
@section('judul', 'List Buku')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                    title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="row" style="margin: 20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="previewBuku" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Genre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($buku as $item)
                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->genre->nama_genre }}</td>
                                    <td>
                                        <a href="{{ route('buku.detail', $item->idBuku) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('buku.hapus', $item->idBuku) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->idBuku }}').submit();"><i class="fas fa-trash"></i></a>
                                        <form id="delete-form-{{ $item->idBuku }}" action="{{ route('buku.hapus', $item->idBuku) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
