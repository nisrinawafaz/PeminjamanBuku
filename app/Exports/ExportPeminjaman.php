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
        return History_Peminjaman::all();
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
