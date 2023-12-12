<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userFavorites = Favorite::all();
        return view('page.user.favourite.listfavourite', compact('userFavorites'));
    }

    public function showFavorites()
    {
        $userFavorites = auth()->user()->favorite;
        return view('page.user.favourite.listfavourite', compact('userFavorites'));
    }

    public function tambahFavorite(Request $request)
    {
        //  // Validasi input jika diperlukan
        // $request->validate([
        //     'idBuku' => 'required|exists:bukus,id',
        // ]);

        // // Dapatkan ID pengguna yang sedang login
        // $idUser = Auth::id();

        // // Cek apakah buku sudah ada di favorit
        // $existingFavorite = Favorite::where('idBuku', $request->idBuku)
        //     ->where('idUser', $idUser)
        //     ->first();

        // if ($existingFavorite) {
        //     return redirect()->route('etalase.index')->with('error', 'Buku sudah ada di favorit.');
        // }

        // // Tambahkan buku ke favorit
        // $favorite = new Favorite();
        // $favorite->idBuku = $request->idBuku;
        // $favorite->idUser = $idUser;
        // $favorite->save();

        // return redirect()->route('etalase.index')->with('success', 'Buku berhasil ditambahkan ke favorit.');
        
        $favorite = new Favorite();
        $favorite->idBuku = $request->idBuku;
        $favorite->idUser = auth()->user()->id; // assuming user is authenticated
        $favorite->save();

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke favorit.');
    
    

        
    }

}
