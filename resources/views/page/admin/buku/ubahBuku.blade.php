@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah Buku')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h1>Tambah
    Buku</h1>
    </div> <div class="col-sm-6"> <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li>
    <li class="breadcrumb-item active">Ubah Buku</li> </ol> </div>
        </div> </div> <!-- /.container-fluid --> </section> <!-- Main content --> <section class="content">
            @if(session('status')) <div class="alert alert-success alert-dismissible"> <button type="button"
            class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4><i class="icon fa fa-check"></i>
        Berhasil!</h4>
        {{ session('status') }}
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
                                value="{{ $buku->judul }}"
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
                                    value="{{ $buku->tahun_terbit }}" 
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
                        <textarea 
                        id="inputDeskripsi" 
                        name="deskripsi" 
                        rows="4" 
                        cols="50"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        required="required">
                        {{ $buku->deskripsi }}</textarea>
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
                                value="{{ $buku->stok}}"
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
                                <input 
                                    type="number"
                                    min="1" 
                                    step="1"
                                    id="inputHarga"
                                    name="harga"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    placeholder="harga /hari"
                                    value="{{ $buku->harga_harian }}"
                                    required="required"
                                    autocomplete="harga">
                                    @error('harga')
                                    <span class="invalid-feedback" role="alert">
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
                                <input 
                                    type="file"
                                    id="inputGambar"
                                    name="cover"
                                    class="form-control @error('cover') is-invalid @enderror"
                                    @if($buku->gambar_cover) value="{{ $buku->gambar_cover }}" @endif
                                    required="required"
                                    autocomplete="cover">
                                    <img id="cover-preview" src="{{ $buku->gambar_cover }}" alt="Cover Preview" style="max-width: 200px; max-height: 200px;">
                                    @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFile">File Buku</label>
                                <input 
                                    type="file"
                                    id="inputFile"
                                    name="file_buku"
                                    class="form-control @error('file_buku') is-invalid @enderror"
                                    @if($buku->path_file) value="{{ $buku->path_file }}" @endif
                                    required="required"
                                    autocomplete="file_buku">
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
                                <select class="form-select" aria-label="Default select example" name="id_genre" id="inputGenre">
                                    @foreach($genre as $g)
                                    <option value="{{  $g->idGenre }}" @if($g->idGenre == $buku->idGenre) selected @endif>{{ $g->nama_genre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPenerbit">Penerbit</label>
                                <select class="form-select" aria-label="Default select example" name="id_penerbit" id="inputPenerbit">
                                    @foreach($penerbit as $p)
                                        <option value="{{  $p->idPenerbit }}" @if($p->idPenerbit == $buku->idPenerbit) selected @endif>{{ $p->perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPenulis">Penulis</label>
                        <select class="form-select" aria-label="Default select example" name="id_penulis" id="inputPenulis">
                        @foreach($penulis as $writer)
                            <option value="{{  $writer->idPenulis }}" @if($writer->idPenulis == $buku->idPenulis) selected @endif>{{ $writer->nama_lengkap }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Ubah Buku" class="btn btn-success float-right">
                </div>
            </div>
        </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
@endsection