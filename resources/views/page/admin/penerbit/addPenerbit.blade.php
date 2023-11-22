@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah Penerbit')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h1>Tambah
    Penerbit</h1> </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li> <li class="breadcrumb-item
                active">Tambah Penerbit</li> </ol> </div> </div>
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
        <h3 class="card-title">Informasi Penerbit</h3>

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
                <label for="inputPerusahaan">Perusahaan Penerbit</label>
                <input
                type="text"
                id="inputPerusahaan"
                name="perusahaan"
                class="form-control @error('perusahaan') is-invalid @enderror"
                placeholder="Masukkan perusahaan penerbit"
                value="{{ old('perusahaan') }}"
                required="required"
                autocomplete="perusahaan">
                @error('perusahaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputAlamat">Alamat Penerbit</label>
                    <textarea id="inputAlamat" name="alamat" rows="4" cols="50" class=?form-control
                        @error('alamat') is-invalid @enderror required="required"></textarea>
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="inputnohp">Nomor Handphone</label>
                <input type="number" min="1" step="1" id="inputnohp" name="no_handphone"
                    class="form-control @error('no_handphone') is-invalid @enderror" placeholder="no_handphone /hari"
                    value="{{ old('no_handphone') }}"
                    required="required"
                    autocomplete="no_handphone">
                    @error('no_handphone') <span
                    class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                <label for="inputEmail">Email Perusahaan</label>
                <input
                type="text"
                id="inputEmail"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Masukkan email penerbit"
                value="{{ old('email') }}"
                required="required"
                autocomplete="email">
                @error('email')
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
                <input type="submit" value="Tambah Penerbit" class="btn btn-success float-right">
            </div>
        </div>
        </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
@endsection