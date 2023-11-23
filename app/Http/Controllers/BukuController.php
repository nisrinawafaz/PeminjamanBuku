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
use DataTables;

class BukuController extends Controller
{
    public function tambahBuku(Request $request)
    {

        DB::enableQueryLog(); // Aktifkan query log

        $genre = Genre::all();
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
                    $destinationPath = public_path('storage/admin/cover_buku');
                    \File::copy(storage_path('app/' . $upload), $destinationPath . '/' . $nama_gambar);
                }

                $file_buku = null;
                if ($request->file('file_buku')) {
                    $nama_file = time() . '_' . $request->file('file_buku')->getClientOriginalName();
                    $upload = $request->file_buku->storeAs('public/admin/file_buku', $nama_file);
                    $file_buku = Storage::url($upload);
                    $destinationPath = public_path('storage/admin/file_buku');
                    \File::copy(storage_path('app/' . $upload), $destinationPath . '/' . $nama_file);
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

                return redirect()
                    ->route('buku.index')
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('bukus')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    $detailUrl = route('buku.detail', $row->idBuku);
                    $editUrl = route('buku.edit', ['idBuku' => $row->idBuku]);
                    $deleteUrl = route('buku.hapus', $row->idBuku);

                    return '<a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.buku.tabelBuku');
    }

    public function etalaseBuku()
    {
        Log::info('Menampilkan daftar buku ke user'); // Log info message
        $buku = Buku::all();
        return view('page.user.buku.etalaseBuku', compact('buku'));
    }

    public function UbahBuku(Request $request, $idBuku)
    {
        $genre = Genre::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $buku = Buku::findOrFail($idBuku);

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
            return redirect()->route('buku.edit', ['id' => $idBuku])
                ->with('error', $error);
        }

        return view('page.admin.buku.ubahBuku', [
            'buku' => $buku,
            'genre' => $genre,
            'penerbit' => $penerbit,
            'penulis' => $penulis
        ]);
    }


    public function bukaBuku($idBuku)
    {
        // Ambil data buku berdasarkan ID dari database
        $buku = Buku::find($idBuku);

        if (!$buku) {
            // Log error message
            Log::error('Buku tidak ditemukan dengan ID: ' . $idBuku);

            // Redirect atau tampilkan pesan jika buku tidak ditemukan
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan');
        }

        Log::info('Membuka buku dengan ID: ' . $idBuku); // Log info message

        return view('page.admin.buku.bukaFileBuku', compact('buku'));
    }

    public function detail($idBuku)
    {
        // Ambil data buku berdasarkan ID dari database
        $buku = Buku::find($idBuku);

        if (!$buku) {
            // Log error message
            Log::error('Buku tidak ditemukan dengan ID: ' . $idBuku);

            // Redirect atau tampilkan pesan jika buku tidak ditemukan
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan');
        }

        Log::info('Melihat detail buku dengan ID: ' . $idBuku); // Log info message

        return view('page.admin.buku.detailBuku', compact('buku'));
    }

    public function hapusBuku($idBuku)
    {
        $buku = Buku::findOrFail($idBuku);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
