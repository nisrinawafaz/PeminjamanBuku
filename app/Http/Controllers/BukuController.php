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
use Exception;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function tambahBuku(Request $request)
    {

        DB::enableQueryLog(); // Aktifkan query log

        $genre = genre::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        try {
            if ($request->isMethod('post')) {
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
                    'idPenulis' => $request->id_penulis,
                    'idPenerbit' => $request->id_penerbit,
                    'idGenre' => $request->id_genre,
                    'judul' => $request->judul,
                    'tahun_terbit' => $request->tahun_terbit,
                    'deskripsi' => $request->deskripsi,
                    'path_file' => $file_buku,
                    'stok' => $request->stok,
                    'harga_harian' => $request->harga,
                    'gambar_cover' => $img
                ]);

                dd(\DB::getQueryLog()); // Tampilkan log query
                return redirect()
                    ->route('buku.tabel')
                    ->with([
                        'success' => 'New post has been created successfully'
                    ]);
            }
        } catch (\Throwable $th) {
            \Log::error($th);
            $error = $th->getMessage();
            return redirect()->route('buku.add')
                ->with('error', $error);
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

        try {
            if ($request->isMethod('post')) {
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
                    if ($img && Storage::exists($img)) {
                        Storage::delete($img);
                    }
                    $nama_gambar = time() . '_' . $request->file('cover')->getClientOriginalName();
                    $upload = $request->cover->storeAs('public/admin/cover_buku', $nama_gambar);
                    $img = Storage::url($upload);
                }

                $file_buku = $buku->path_file; 
                if ($request->file('file_buku')) {
                    if ($file_buku && Storage::exists($file_buku)) {
                        Storage::delete($file_buku);
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
        } catch (\Throwable $th) {
            Log::error($th);
            $error = $th->getMessage();
            return redirect()->route('buku.edit', ['id' => $id])
                ->with('error', $error);
        }

        return view('page.admin.buku.ubahBuku', [
            'buku' => $buku,
            'genre' => $genre,
            'penerbit' => $penerbit,
            'penulis' => $penulis
        ]);
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
        $buku = Buku::findOrFail($id);
        $buku -> delete();

        return redirect()->route('buku.tabel')->with('success', 'Buku berhasil dihapus');
    }
}
