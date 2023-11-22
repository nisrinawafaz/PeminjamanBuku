<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

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
