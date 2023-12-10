@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Tambah Genre')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Genre</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li>
                    <li class="breadcrumb-item active">Tambah Genre</li>
                </ol>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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

                        <div class="form-group">
                            <label for="inputNamaGenre">Nama Genre</label>
                            <input
                            type="text"
                            id="inputNamaGenre"
                            name="nama_genre"
                            class="form-control @error('nama_genre') is-invalid @enderror"
                            placeholder="Masukkan Nama Genre"
                            value="{{ old('nama_genre') }}"
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
                        <input type="submit" value="Tambah Genre" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

@endsection

@section('script_footer')
@endsection
