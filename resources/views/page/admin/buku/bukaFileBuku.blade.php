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
                    <li class="breadcrumb-item"><a href="{{ route('buku.tabel') }}">Daftar Buku</a></li>
                    <li class="breadcrumb-item active">Detail Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <iframe src="{{ asset('storage/admin/E-Book/contoh1.pdf') }}" style="width:100%; height:500px;"></iframe>
    </div>
</section>
@endsection
