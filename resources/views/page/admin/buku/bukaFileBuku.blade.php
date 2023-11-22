<!-- resources/views/buku/detail.blade.php -->

@extends('layouts.base_admin.base_dashboard')
@section('judul', 'File Buku')

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
        @if ($buku)
            <iframe src="{{ $buku->path_file }}" style="width:100%; height:600px;"></iframe>
        @else
            <div class="alert alert-danger">
                Buku tidak ditemukan.
            </div>
        @endif
    </div>
</section>

@endsection
