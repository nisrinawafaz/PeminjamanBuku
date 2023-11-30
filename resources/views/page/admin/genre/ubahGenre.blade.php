@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Ubah Genre')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Genre</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li>
                    <li class="breadcrumb-item active">Ubah Genre</li>
                </ol>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            {{ session('status') }}
        </div>
    @endif

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Informasi Genre</h3>

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
                                    <label for="inputIdGenre">ID Genre</label>
                                    <input
                                    type="text"
                                    id="inputIdGenre"
                                    name="idGenre"
                                    class="form-control @error('idGenre') is-invalid @enderror"
                                    placeholder="Masukkan ID Genre"
                                    value="{{ $genre->idGenre }}"
                                    required="required"
                                    autocomplete="idGenre" readonly>
                                    @error('idGenre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaGenre">Nama Genre</label>
                            <input
                            type="text"
                            id="inputNamaGenre"
                            name="nama_genre"
                            class="form-control @error('nama_genre') is-invalid @enderror"
                            placeholder="Masukkan Nama Genre"
                            value="{{ $genre->nama_genre }}"
                            required="required"
                            autocomplete="nama_genre">
                            @error('nama_genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Ubah Genre" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
<!-- Any additional scripts go here if needed -->
@endsection
