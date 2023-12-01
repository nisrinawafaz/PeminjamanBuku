<?php

namespace App\Http\Controllers;
use App\Models\History_Peminjaman;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Exports\ExportPeminjaman;
use App\Imports\ImportPeminjaman;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class HistoryPeminjamanController extends Controller
{

    public function tampilPeminjaman()
    {
       
        $peminjaman = History_Peminjaman::all();
        return view('page.admin.historypeminjaman.tabelPeminjaman', compact('peminjaman'));
    }
    public function export()
    {
        return Excel::download(new ExportPeminjaman, 'history_peminjaman.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ImportPeminjaman, $file);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = History_Peminjaman::select([
                    'history_peminjaman.*', 
                    'users.name as user_name', 
                    'bukus.judul as book_title'
                ])
                ->leftJoin('users', 'history_peminjaman.idUser', '=', 'users.id')
                ->leftJoin('bukus', 'history_peminjaman.idBuku', '=', 'bukus.id')
                ->get();

            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    $detailUrl = route('penerbit.detail', $row->idPeminjaman);
                    $editUrl = route('penerbit.edit', ['id' => $row->idPeminjaman]);
                    $deleteUrl = route('penerbit.hapus', $row->idPeminjaman);

                    return '<a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="' . $deleteUrl . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            <form id="delete-form-' . $row->idPeminjaman . '" action="' . $deleteUrl . '" method="POST" style="display: none;">
                                @csrf
                                @method(\'delete\')
                            </form>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.historypeminjaman.tabelPeminjaman');
    }
}