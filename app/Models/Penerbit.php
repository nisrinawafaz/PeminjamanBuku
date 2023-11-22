<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'idPenerbit';
    protected $fillable = [
        'perusahaan',
        'alamat',
        'no_handphone',
        'email'
    ];
}
