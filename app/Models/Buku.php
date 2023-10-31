<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(History_Peminjaman::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function rating()
    {
        return $this->hasMany(History_Rating::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'idBuku';
    protected $fillable = [
        'idPenulis',
        'idPenerbit',
        'idGenre',
        'judul',
        'tahun_terbit',
        'deskripsi',
        'path_file',
        'stok',
        'harga_harian',
        'gambar_cover'
    ];
}
