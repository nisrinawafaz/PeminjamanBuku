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

class PenulisController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penulis')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    // $detailUrl = route('penulis.detail', $row->idPenulis);
                    $editUrl = route('penulis.ubah', ['idPenulis' => $row->idPenulis]);
                    $deleteUrl = route('penulis.hapus', $row->idPenulis);
                    
                    // <a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>

                    return '
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="' . $deleteUrl . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.penulis.index');
    }

    
    public function tambahPenulis(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nama_lengkap' => 'required|string|max:255',
                'domisili' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'email' => 'required|string|email|unique:penulis,email',
            ]);

            $penulis = Penulis::create([
                'nama_lengkap' => $request->nama_lengkap,
                'domisili' => $request->domisili,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email
            ]);

            return redirect()->route('penulis.index')->with('status', 'Data penulis berhasil ditambahkan');
        }

        return view('page.admin.penulis.addPenulis');
    }

    public function ubahPenulis($idPenulis, Request $request)
    {
        $penulis = Penulis::findOrFail($idPenulis);

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nama_lengkap' => 'required|string|max:255',
                'domisili' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'email' => 'required|string|email|unique:penulis,email,' . $penulis->idPenulis,
            ]);

            $penulis->update($request->all());

            return redirect()->route('penulis.index')->with('status', 'Data penulis berhasil diubah');
        }

        return view('page.admin.penulis.ubahPenulis', ['penulis' => $penulis]);
    }
    
    public function hapusPenulis($idPenulis)
    {
        $penulis = Penulis::findOrFail($idPenulis);
        
        $penulis->delete($idPenulis);

        return response()->json([
            'msg' => 'Data penulis yang dipilih telah dihapus'
        ]);
    }


}