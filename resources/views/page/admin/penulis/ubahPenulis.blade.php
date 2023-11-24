@extends('layouts.base_admin.base_dashboard') @section('judul', 'Edit Penulis')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h1>Tambah
    Penulis</h1> </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"> <a href="{{ route('home') }}">Beranda</a> </li> <li class="breadcrumb-item
                active">Ubah Penulis</li> </ol> </div> </div>
    </div> <!-- /.container-fluid -->
</section> <!-- Main content -->
<section class="content">
    @if(session('status')) <div class="alert alert-success alert-dismissible"> <button type="button"
        class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4><i class="icon fa fa-check"></i>
    Berhasil!</h4>
    {{ session('status') }}
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
                <label for="inputNama">Nama Lengkap</label>
                <input
                type="text"
                id="inputNama"
                name="nama_lengkap"
                class="form-control @error('nama_lengkap') is-invalid @enderror"
                placeholder="Masukkan nama lengkap penulis"
                value="{{ $penulis->nama_lengkap }}"
                required="required"
                autocomplete="nama_lengkap">
                @error('nama_lengkap')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>

                    </div>
                <div class="form-group">
                <label for="inputDomisili">Domisili</label>
                <input
                type="text"
                id="inputDomisili"
                name="domisili"
                class="form-control @error('domisili') is-invalid @enderror"
                placeholder="Masukkan domisili penulis"
                value="{{ $penulis->domisili }}"
                required="required"
                autocomplete="domisili">
                @error('domisili')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
            
                    </div>
            </div>

            <div class="form-group">
                <label for="inputTanggalLahir">Tanggal Lahir</label>
                <input type="date" min="1" step="1" id="inputTanggalLahir" name="tanggal_lahir"
                    class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Masukkan tanggal lahir"
                    value="{{ $penulis->tanggal_lahir }}"
                    required="required"
                    autocomplete="tanggal_lahir">
                    @error('tanggal_lahir') <span
                    class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                <label for="inputEmail">Email</label>
                <input
                type="text"
                id="inputEmail"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Masukkan email penerbit"
                value="{{ $penulis->email }}"
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
            <div class="row">
                <div class="col-12">
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Ubah Buku" class="btn btn-success float-right">
                </div>
            </div>
        </div>
        </form>
</section>
<!-- /.content -->

