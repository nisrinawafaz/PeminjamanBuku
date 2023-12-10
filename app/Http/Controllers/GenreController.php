<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class GenreController extends Controller
{
    public function tambahGenre(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nama_genre' => 'required|unique:genres',
            ]);

            $genre = Genre::create([
                'nama_genre' => $request->nama_genre,
            ]);

            return redirect()
                ->route('genre.index')
                ->with([
                    'success' => 'Genre berhasil ditambahkan'
                ]);
        }

        return view('page.admin.genre.addGenre');
    }

    public function tampilGenre()
    {
        $genres = Genre::all();
        return view('page.admin.genre.tabelGenre', compact('genres'));
    }

    public function detail($idGenre)
    {
        $genre = Genre::find($idGenre);

        if (!$genre) {
            return redirect()->route('genre.index')->with('error', 'Genre tidak ditemukan');
        }

        return view('page.admin.genre.detailGenre', compact('genre'));
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('genres')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    $detailUrl = route('genre.detail', $row->idGenre);
                    $editUrl = route('genre.edit', ['id' => $row->idGenre]);
                    $deleteUrl = route('genre.hapus', $row->idGenre);

                    return '<a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>'
                            ;
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.genre.tabelGenre');
    }

    public function ubahGenre(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'idGenre' => 'required',
                'nama_genre' => 'required|unique:genres',
            ]);

            $genre->update([
                'idGenre' => $request->idGenre,
                'nama_genre' => $request->nama_genre,
            ]);

            $genres = Genre::all();
            return view('page.admin.genre.tabelGenre', compact('genres'));
        }

        return view('page.admin.genre.ubahGenre', ['genre' => $genre]);
    }

        public function tabel(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('genres')->select('*'); // Assuming the table name is 'genres'
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    // Your options column code
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.genre.tabelGenre');
    }


    public function hapusGenre($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus');
    }
}
