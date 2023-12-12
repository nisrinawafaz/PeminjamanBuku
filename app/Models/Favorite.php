<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idUser',
        'idBuku'
    ];
}
