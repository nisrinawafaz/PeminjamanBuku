<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $primaryKey = 'idPenulis';

    use HasFactory;

    public function tambahBukuPenulis($dataBuku)
    {
        // Logika untuk membuat buku baru
        return $this->buku()->create($dataBuku);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class,'idPenulis', 'idPenulis');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'domisili',
        'tanggal_lahir',
        'email'
    ];
}
