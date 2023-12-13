<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\DB;
use DataTables;

class AkunController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $columns = ['name', 'email', 'user_image', 'id'];
            $totalDataRecord = User::where('id', '!=', Auth::id())->where('roles', false)->count();

            $dataTable = DataTables::of(User::where('id', '!=', Auth::id())->where('roles', false)->select($columns));

            $dataTable->addColumn('user_image', function ($user) {
                $img = $user->user_image ? $user->user_image : asset('vendor/adminlte3/img/user2-160x160.jpg');
                return "<img src='$img' class='img-thumbnail' width='200px'>";
            });

            $dataTable->addColumn('options', function ($user) {
                $editUrl = route('akun.edit', ['id' => $user->id]);
                $deleteUrl = route('akun.delete', $user->id);
                return "<a href='$editUrl'><i class='fas fa-edit fa-lg'></i></a> 
                        <a style='border: none; background-color:transparent;' class='hapusData' data-id='$user->id' data-url='$deleteUrl'>
                            <i class='fas fa-trash fa-lg text-danger'></i>
                        </a>";
            });

            $dataTable->rawColumns(['user_image', 'options']);
            return $dataTable->make(true);
        }

        return view('page.admin.akun.index');
    }

    public function tambahAkun(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string|max:200|min:3',
                'email' => 'required|string|min:3|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img = null;
            if ($request->file('user_image')) {
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img = Storage::url($upload);
            }
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_image' => $img
            ]);
            $logger = new Logger();
            $logger->info('Tambah Akun berhasil');
            return redirect()->route('akun.add')->with('status', 'Data telah tersimpan di database');
            
        }
        return view('page.admin.akun.addAkun');
    }

    public function ubahAkun($id, Request $request)
    {
        $logger = new Logger();
        $usr = User::findOrFail($id);
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string|max:200|min:3',
                'email' => 'required|string|min:3|email|unique:users,email,'.$usr->id,
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img = $usr->user_image;
            if ($request->file('user_image')) {
                # delete old img
                if ($img && file_exists(public_path().$img)) {
                    unlink(public_path().$img);
                }
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img = Storage::url($upload);
            }
            $usr->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_image' => $img
            ]);
            $logger->info('Ubah akun berhasil');
            return redirect()->route('akun.edit',['id' => $usr->id ])->with('status', 'Data telah tersimpan di database');
        }
        return view('page.admin.akun.ubahAkun', [
            'usr' => $usr
        ]);
    }

    public function hapusAkun($id)
    {
        $usr = User::findOrFail($id);
        if ($usr->user_image && file_exists(public_path().$usr->user_image)) {
            unlink(public_path().$usr->user_image);
        }
        $usr->delete($id);
        return response()->json([
            'msg' => 'Data yang dipilih telah dihapus'
        ]);
    }
}
