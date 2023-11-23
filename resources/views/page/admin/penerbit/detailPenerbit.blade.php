<!-- resources/views/buku/detail.blade.php -->

@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Penerbit')

@section('content')
<section class "content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Penerbit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('penerbit.index') }}">Daftar Buku</a></li>
                    <li class="breadcrumb-item active">Detail Penerbit</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Perushaan</th>
                            <td>{{ $penerbit->perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $penerbit->alamat}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Handphone</th>
                            <td>{{ $penerbit->no_handphone }}</td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td>{{ $penerbit->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
