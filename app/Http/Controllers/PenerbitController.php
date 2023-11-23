<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use Illuminate\Support\Facades\DB;
use DataTables;

class PenerbitController extends Controller
{
    public function tambahPenerbit(Request $request)
    {

        
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'perusahaan' => 'required',
                'alamat' => 'required',
                'no_handphone' => 'required',
                'email' => 'required|email',
                
            ]);
            
            $penerbit = Penerbit::create([
                'perusahaan' => $request->perusahaan,
                'alamat' => $request->alamat,
                'no_handphone' => $request->no_handphone,
                'email' => $request->email,
            ]);

            
            return redirect()
                ->route('penerbit.tabel')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        }
        
        return view('page.admin.penerbit.addPenerbit');
    

    }

    public function tampilPenerbit()
    {
       
        $penerbit = Penerbit::all();
        return view('page.admin.penerbit.tabelPenerbit', compact('penerbit'));
    }

    public function detail($idPenerbit)
    {
        // Ambil data buku berdasarkan ID dari database
        $penerbit = Penerbit::find($idPenerbit);

        if (!$penerbit) {
            
            // Redirect atau tampilkan pesan jika buku tidak ditemukan
            return redirect()->route('penerbit.index')->with('error', 'penerbit tidak ditemukan');
        }

        return view('page.admin.penerbit.detailPenerbit', compact('penerbit'));
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penerbits')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    $detailUrl = route('penerbit.detail', $row->idPenerbit);
                    $editUrl = route('penerbit.edit', ['id' => $row->idPenerbit]);
                    $deleteUrl = route('penerbit.hapus', $row->idPenerbit);

                    return '<a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="' . $deleteUrl . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            <form id="delete-form-' . $row->idPenerbit . '" action="' . $deleteUrl . '" method="POST" style="display: none;">
                                @csrf
                                @method(\'delete\')
                            </form>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.penerbit.tabelPenerbit');
    }

    public function ubahPenerbit(Request $request, $id)
    {

        $penerbit = Penerbit::findOrFail($id);
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'perusahaan' => 'required',
                'alamat' => 'required',
                'no_handphone' => 'required',
                'email' => 'required|email',
                
            ]);
            
            $penerbit ->update([
                'perusahaan' => $request->perusahaan,
                'alamat' => $request->alamat,
                'no_handphone' => $request->no_handphone,
                'email' => $request->email,
            ]);

            $penerbit = Penerbit::all();
            // return redirect()
            //     ->route('penerbit.tabel')
            //     ->with([
            //         'success' => 'New post has been created successfully'
            //     ]);
            return view('page.admin.penerbit.tabelPenerbit', compact('penerbit'));
        }
        
        return view('page.admin.penerbit.ubahPenerbit',['penerbit'=>$penerbit]);
    

    }

    public function hapusPenerbit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit -> delete();

        return redirect()->route('penerbit.tabel')->with('success', 'Penerbit berhasil dihapus');
    }

}
