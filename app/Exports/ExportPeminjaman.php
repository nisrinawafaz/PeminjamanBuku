<?php

namespace App\Exports;

use App\Models\History_Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPeminjaman implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $historyPeminjaman = History_Peminjaman::with(['user', 'buku'])->get();

        return $historyPeminjaman->map(function ($item) {
            return [
                'Id Pesanan' => $item->idPeminjaman,
                'Nama Peminjam' => $item->user->name, // Ganti 'nama' dengan nama kolom yang sesuai pada model User
                'Judul Buku' => $item->buku->judul, // Ganti 'judul' dengan nama kolom yang sesuai pada model Buku
                'Tgl Peminjaman' => $item->tgl_peminjaman,
                'Tgl Pengembalian' => $item->tgl_pengembalian,
                'Total Bayar' => $item->total_pembayaran,
            ];
        });
    }
    
    public function headings(): array
    {
       
        return [
            'Id Pesanan',
            'Nama Peminjam',
            'Judul Buku',
            'Tgl Peminjaman',
            'Tgl Pengembalian',
            'Total Bayar'
        ];
    }
}
