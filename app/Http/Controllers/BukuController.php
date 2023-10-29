<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function tambahBuku(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'idPenulis'=> 'required',
                'idPenerbit'=> 'required',
                'idGenre'=> 'required',
                'judul'=> 'required',
                'tahun_terbit'=> 'required',
                'deskripsi'=> 'required',
                'path_file'=> 'file|mimes:pdf,doc,docx|max:2048',
                'stok'=> 'required',
                'harga_harian'=> 'required',
                'gambar_cover'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
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
    
            if ($buku) {
                return redirect()
                    ->route('buku.add')
                    ->with([
                        'success' => 'New post has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        }
        return view('page.admin.buku.addBuku');
    }
}
