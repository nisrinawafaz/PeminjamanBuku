@extends('layouts.base_admin.base_dashboard')
@section('judul', 'History Peminjaman')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>History Peminjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                    title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="row" style="margin: 20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('peminjaman.export') }}" class="btn btn-success">Export Data</a>
                        <form action="{{ route('peminjaman.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Import Data</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                        <table id="previewPeminjaman" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Tgl peminjaman</th>
                                    <th>Tgl pengembalian</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman as $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->tgl_peminjaman }}</td>
                                    <td>{{ $item->tgl_pengembalian }}</td>
                                    <td>{{ $item->total_pembayaran }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection