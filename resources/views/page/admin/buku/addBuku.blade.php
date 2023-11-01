@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah Buku')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h1>Tambah
    Buku</h1> </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li> <li class="breadcrumb-item
                active">Tambah Buku</li> </ol> </div> </div>
    </div> <!-- /.container-fluid -->
</section> <!-- Main content -->
<section class="content">
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <form method="post" enctype="multipart/form-data">
    @csrf <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Informasi Data Diri</h3>

        <div class="card-tools">
            <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-sm">
            <div class="row">
            <div class="col-md-8">
            <div class="form-group">
                <label for="inputJudul">Judul Buku</label>
                <input
                type="text"
                id="inputJudul"
                name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                placeholder="Masukkan judul Buku"
                value="{{ old('judul') }}"
                required="required"
                autocomplete="judul">
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="inputTahun">Tahun Terbit</label>
                        <div class="input-group date">
                            <input
                            type="number"
                            id="inputTahun"
                            name="tahun_terbit"
                            class="form-control @error('tahun_terbit') is-invalid @enderror"
                            placeholder="Tahun Terbit"
                            value="{{ date('Y') }}"
                            min="1900"
                            max="{{ date('Y')}}">
                            @error('tahun_terbit')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="inputDeskripsi">Deskripsi Buku</label>
                    <textarea id="inputDeskripsi" name="deskripsi" rows="4" cols="50" class=?form-control
                        @error('deskripsi') is-invalid @enderror" required="required"></textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="inputStok">Stok Buku</label>
                <input
                type="number"
                id="inputStok"
                name="stok"
                class="form-control @error('stok') is-invalid @enderror"
                placeholder="Stok Awal"
                value="{{ old('stok') }}"
                required="required"
                autocomplete="stok">
                @error('stok')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="inputHarga">Harga Sewa</label>
                        <input type="number" min="1" step="1" id="inputHarga" name="harga"
                            class="form-control @error('harga') is-invalid @enderror" placeholder="harga /hari"
                            value="{{ old('harga') }}" required="required" autocomplete="harga"> @error('harga') <span
                            class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputGambar">Gambar Cover</label>
                                <input type="file" id="inputGambar" name="cover"
                                    class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover') }}"
                                    required="required" autocomplete="cover">
                                @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div id="error-message"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFile">File Buku</label>
                                <input type="file" id="inputFile" name="file_buku"
                                    class="form-control @error('file_buku') is-invalid @enderror"
                                    value="{{ old('file_buku') }}" required="required" autocomplete="file_buku">
                                @error('file_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputGenre">Genre</label>
                                <select class="form-select" aria-label="Default select example" name="id_genre"
                                    id="inputGenre">
                                    @foreach($genre as $g)
                                    <option value="{{  $g->idGenre }}">{{ $g->nama_genre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPenerbit">Penerbit</label>
                                <select class="form-select" aria-label="Default select example" name="id_penerbit"
                                    id="inputPenerbit">
                                    @foreach($penerbit as $p)
                                    <option value="{{  $p->idPenerbit }}">{{ $p->perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPenulis">Penulis</label>
                        <select class="form-select" aria-label="Default select example" name="id_penulis"
                            id="inputPenulis">
                            @foreach($penulis as $writer)
                            <option value="{{  $writer->idPenulis }}">{{ $writer->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Tambah Buku" class="btn btn-success float-right">
            </div>
        </div>
        </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
@endsection