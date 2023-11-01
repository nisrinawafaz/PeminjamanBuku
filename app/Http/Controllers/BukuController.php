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
use Illuminate\Support\Facades\Log;

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
        Log::info('Menampilkan daftar buku'); // Log info message
        $buku = Buku::all();
        return view('page.admin.buku.tabelBuku', compact('buku'));
    }

    public function UbahBuku(Request $request, $id)
    {
        $genre = Genre::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $buku = Buku::findOrFail($id);

        if ($request->isMethod('post')){

        $this->validate($request, [
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_genre' => 'required',
            'judul' => 'required',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'required',
            'file_buku' => 'file|mimes:pdf,doc,docx|max:2048',
            'stok' => 'required',
            'harga' => 'required',
            'cover' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);

        
        $img = $buku->gambar_cover; 
        if ($request->file('cover')) {
            if ($img && file_exists(public_path() . $img)) {
                unlink(public_path() . $img);
            }
            $nama_gambar = time() . '_' . $request->file('cover')->getClientOriginalName();
            $upload = $request->cover->storeAs('public/admin/cover_buku', $nama_gambar);
            $img = Storage::url($upload);
        }

        
        $file_buku = $buku->path_file; 
        if ($request->file('file_buku')) {
            if ($file_buku && file_exists(public_path() . $file_buku)) {
                unlink(public_path() . $file_buku);
            }
            $nama_file = time() . '_' . $request->file('file_buku')->getClientOriginalName();
            $upload = $request->file_buku->storeAs('public/admin/file_buku', $nama_file);
            $file_buku = Storage::url($upload);
        }


        $buku->update([
            'idPenulis' => $request->id_penulis,
            'idPenerbit' => $request->id_penerbit,
            'idGenre' => $request->id_genre,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'deskripsi' => $request->deskripsi,
            'path_file' => $file_buku,
            'stok' => $request->stok,
            'harga_harian' => $request->harga,
            'gambar_cover' => $img,
        ]);

        $buku = Buku::all();
        return view('page.admin.buku.tabelBuku', compact('buku'));


        }
        return view('page.admin.buku.ubahBuku', [
            'buku' => $buku,
            'genre' => $genre,
            'penerbit' => $penerbit,
            'penulis' => $penulis
        ], );

    }

    public function bukaBuku($id)
    {
        // Ambil data buku berdasarkan ID dari database
        $buku = Buku::find($id);

        if (!$buku) {
            // Log error message
            Log::error('Buku tidak ditemukan dengan ID: ' . $id);
            
            // Redirect atau tampilkan pesan jika buku tidak ditemukan
            return redirect()->route('buku.tabel')->with('error', 'Buku tidak ditemukan');
        }

        Log::info('Membuka buku dengan ID: ' . $id); // Log info message

        return view('page.admin.buku.bukaFileBuku', compact('buku'));
    }

    public function detail($id)
    {
        // Ambil data buku berdasarkan ID dari database
        $buku = Buku::find($id);

        if (!$buku) {
            // Log error message
            Log::error('Buku tidak ditemukan dengan ID: ' . $id);
            
            // Redirect atau tampilkan pesan jika buku tidak ditemukan
            return redirect()->route('buku.tabel')->with('error', 'Buku tidak ditemukan');
        }

        Log::info('Melihat detail buku dengan ID: ' . $id); // Log info message

        return view('page.admin.buku.detailBuku', compact('buku'));
    }

    public function hapusBuku($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return redirect()->route('buku.tabel')->with('error', 'Buku tidak ditemukan');
        }

        if ($buku->gambar_cover) {
            Storage::delete('public/admin/cover_buku/' . basename($buku->gambar_cover));
        }

        if ($buku->path_file) {
            Storage::delete('public/admin/file_buku/' . basename($buku->path_file));
        }

        $buku->delete($id);

        return redirect()->route('buku.tabel')->with('success', 'Buku berhasil dihapus');
    }
}
