<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Genre;
use App\Models\History_Peminjaman;
use Carbon\Carbon;

class SewaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        // Ambil data buku berdasarkan ID
        $buku = Buku::find($id);

        // Kirim data buku ke view
        return view('page.user.peminjaman.crudSewa', compact('buku'));
    }

    public function tambahPeminjaman(Request $request)
    {
        try {
            \Log::info($request->all());
            $peminjaman = History_Peminjaman::create([
                'idPeminjaman' => 1,
                'idBuku' => $request->idBuku,
                'idUser' => $request->idUser,
                'tgl_peminjaman' => now(),
                'tgl_pengembalian' => now()->addDays($request->lamaSewa),
                'total_pembayaran' => $request->hargaBuku *$request->lamaSewa
            ]);
            return redirect()
                ->route('etalaseBuku.etalasebuku')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } catch (\Throwable $th) {
            \Log::error($th);
            $error = $th->getMessage();
            return redirect()->route('etalaseBuku.etalaseBuku')
                ->with('error', $error);
        }

    }
}
