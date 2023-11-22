@extends('layouts.base_admin.base_dashboard')
@section('judul', 'List Penerbit')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Penerbit</h1>
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
                        @if ($penerbit->isEmpty())
                            <p>Tidak ada buku yang tersedia.</p>
                        @else
                            <table id="previewPenerbit" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Perusahaan</th>
                                        <th>Email</th>
                                        <th>Kontak</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penerbit as $item)
                                    <tr>
                                        <td>{{ $item->perusahaan }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->no_handphone }}</td>
                                        <td>
                                            @if (!$penerbit->isEmpty())
                                                {{-- <a href="{{ route('buku.detail', $item->idBuku) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a> --}}
                                                <a href="{{ route('penerbit.edit', ['id' => $item->idPenerbit]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('penerbit.hapus', $item->idPenerbit) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->idPenerbit }}').submit();"><i class="fas fa-trash"></i></a>
                                                <form id="delete-form-{{ $item->idPenerbit }}" action="{{ route('penerbit.hapus', $item->idPenerbit) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @else
                                                <span class="text-danger">Tidak ada buku yang tersedia.</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
