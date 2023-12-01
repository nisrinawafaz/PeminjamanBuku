<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
         // Validasi input jika diperlukan
        $request->validate([
            'idBuku' => 'required|exists:bukus,id',
        ]);

        // Dapatkan ID pengguna yang sedang login
        $idUser = Auth::id();

        // Cek apakah buku sudah ada di favorit
        $existingFavorite = Favorite::where('idBuku', $request->idBuku)
            ->where('idUser', $idUser)
            ->first();

        if ($existingFavorite) {
            return redirect()->route('etalase.index')->with('error', 'Buku sudah ada di favorit.');
        }

        // Tambahkan buku ke favorit
        $favorite = new Favorite();
        $favorite->idBuku = $request->idBuku;
        $favorite->idUser = $idUser;
        $favorite->save();

        return redirect()->route('etalase.index')->with('success', 'Buku berhasil ditambahkan ke favorit.');
    }

}
