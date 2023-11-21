@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Ubah Penulis')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Penulis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Ubah Penulis</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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

        <form method="post" action="{{ route('penulis.ubah', ['idPenulis' => $penulis->idPenulis]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add your form fields for penulis here -->
            <div class="form-group">
                <label for="inputNama">Nama Penulis</label>
                <input type="text" id="inputNama" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Masukkan nama penulis" value="{{ $penulis->nama_lengkap }}" required="required" autocomplete="nama_lengkap">
                @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputDomisili">Domisili Penulis</label>
                <input type="text" id="inputDomisili" name="domisili" class="form-control @error('domisili') is-invalid @enderror" placeholder="Masukkan domisili penulis" value="{{ $penulis->domisili }}" required="required" autocomplete="domisili">
                @error('domisili')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputTanggalLahir">Tanggal Lahir</label>
                <input type="date" id="inputTanggalLahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $penulis->tanggal_lahir }}" required="required" autocomplete="tanggal_lahir">
                @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputEmail">Email Penulis</label>
                <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email penulis" value="{{ $penulis->email }}" required="required" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Ubah Penulis" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script_footer')
    <!-- Additional scripts, if any -->
@endsection
