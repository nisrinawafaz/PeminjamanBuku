<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Peminjaman extends Model
{
    use HasFactory;
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idUser',
        'idBuku',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'total_pembayaran',
    ];
}