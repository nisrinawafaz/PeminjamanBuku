<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function tambahBuku(Request $request)
    {
        $genre = Genre::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'id_penulis'=> 'required',
                'id_penerbit'=> 'required',
                'id_genre'=> 'required',
                'judul'=> 'required',
                'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
                'deskripsi'=> 'required',
                'file_buku'=> 'file|mimes:pdf,doc,docx|max:2048',
                'stok'=> 'required',
                'harga'=> 'required',
                'cover'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img = null;
            if ($request->file('cover')) {
                $nama_gambar = time() . '_' . $request->file('cover')->getClientOriginalName();
                $upload = $request->cover->storeAs('public/admin/cover_buku', $nama_gambar);
                $img = Storage::url($upload);
            }

            $file_buku = null;
            if ($request->file('file_buku')) {
                $nama_file = time() . '_' . $request->file('file_buku')->getClientOriginalName();
                $upload = $request->file_buku->storeAs('public/admin/file_buku', $nama_file);
                $file_buku = Storage::url($upload);
            }            
            $buku = Buku::create([
                'idPenulis'=> $request->id_penulis,
                'idPenerbit'=> $request->id_penerbit,
                'idGenre'=> $request->id_genre,
                'judul'=> $request->judul,
                'tahun_terbit'=> $request->tahun_terbit,
                'deskripsi'=> $request->deskripsi,
                'path_file'=> $file_buku,
                'stok'=> $request->stok,
                'harga_harian'=> $request->harga,
                'gambar_cover'=> $img
            ]);
            return redirect()
                    ->route('buku.add')
                    ->with([
                        'success' => 'New post has been created successfully'
                    ]);
        }
        return view('page.admin.buku.addBuku', compact('genre'))
            ->with('penulis', $penulis)
            ->with('penerbit', $penerbit);
    }

    public function tampilBuku()
    {
        $buku = Buku::all();
        return view('page.admin.buku.tabelBuku', compact('buku'));
    }
}
