<?php

namespace App\Http\Controllers;

use App\Http\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function tambahGenre(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nama_genre' => 'required|unique:genres',
            ]);

            Genre::create($request->all());

            return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan');
        }

        return view('genres.tambah');
    }

    public function ubahGenre(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return redirect()->route('genre.index')->with('error', 'Genre tidak ditemukan');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nama_genre' => 'required|unique:genres,nama_genre,' . $id,
            ]);

            $genre->update($request->all());

            return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui');
        }

        return view('genres.ubah', compact('genre'));
    }

    public function hapusGenre($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return redirect()->route('genre.index')->with('error', 'Genre tidak ditemukan');
        }

        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus');
    }
}
