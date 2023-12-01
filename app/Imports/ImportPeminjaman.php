<?php

namespace App\Imports;

use App\Models\History_Peminjaman;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPeminjaman implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new History_Peminjaman([
            'idPeminjaman' => $row[0],
            'idBuku' => $row[1],
            'idUser' => $row[2],
            'tgl_peminjaman' => $row[3],
            'tgl_pengembalian' => $row[4],
            'total_pembayaran' => $row[5]
        ]);
    }
}
