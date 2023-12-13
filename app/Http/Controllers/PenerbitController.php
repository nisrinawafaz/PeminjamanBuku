<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Repositories\PenerbitRepository;
use App\Validator\PenerbitValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class PenerbitController extends Controller
{
    protected $penerbitRepository;

    public function __construct(PenerbitRepository $penerbitRepository)
    {
        $this->penerbitRepository = $penerbitRepository;
    }
    public function tambahPenerbit(Request $request)
    {
        DB::enableQueryLog();
        try{
        if ($request->isMethod('post')) {
            // $this->validate($request, [
            //     'perusahaan' => 'required',
            //     'alamat' => 'required',
            //     'no_handphone' => 'required',
            //     'email' => 'required|email',
                
            // ]);
            PenerbitValidation::validatePenerbit($request);
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
        } catch (\Throwable $th) {
            \Log::error($th);
            $error = $th->getMessage();
            return redirect()->route('penerbit.add')
                ->with('error', $error);
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
                            <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.penerbit.tabelPenerbit');
    }

    public function ubahPenerbit(Request $request, $id)
    {
        try{
        $penerbit = Penerbit::findOrFail($id);
        //$penerbit = $this->penerbitRepository->find($id);
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
        } catch (\Throwable $th) {
            Log::error($th);
            $error = $th->getMessage();
            return redirect()->route('penerbit.edit', ['id' => $id])
                ->with('error', $error);
        }
        
        return view('page.admin.penerbit.ubahPenerbit',['penerbit'=>$penerbit]);
    

    }

    public function hapusPenerbit($id)
    {
        // $penerbit = Penerbit::findOrFail($id);
        // $penerbit -> delete();
        $this->penerbitRepository->delete($id);

        return redirect()->route('penerbit.tabel')->with('success', 'Penerbit berhasil dihapus');
    }

}
