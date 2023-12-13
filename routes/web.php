<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\HistoryPeminjamanController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::controller(HistoryPeminjamanController::class)
    ->prefix('peminjaman')
    ->as('sewa.')
    ->group(function () {
        Route::get('/{id}', 'addToCart')->name('cart');
        Route::post('/checkout', 'tambahPeminjaman')->name('add');
        Route::get('/mybook/{id}', 'lihatPeminjaman')->name('show');
        Route::get('/mybook/{id}/detail', 'detailPeminjaman')->name('detail');
    });

Route::controller(BukuController::class)
    ->prefix('etalaseBuku')
    ->as('etalaseBuku.')
    ->group(function () {
        Route::get('/', 'etalaseBuku')->name('etalaseBuku');
        Route::get('/{idBuku}/detail', 'etalaseDetail')->name('detail');
    });

Route::resource('favorite', FavoriteController::class)->only(['index', 'store']);
Route::middleware('auth')->post('/favorite/add', [FavoriteController::class, 'addFavorite'])->name('favorite.add');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::group(['prefix' => 'dashboard/admin','middleware'=>'check_roles'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::match(['get', 'post'], 'tambah', 'tambahAkun')->name('add');
            Route::match(['get', 'post'], '{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });

    Route::controller(PenulisController::class)
        ->prefix('penulis')
        ->as('penulis.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{idPenulis}/detail', 'detail')->name('detail');
            Route::post('/dataTable', 'dataTable')->name('dataTable');
            Route::match(['get', 'post'], '/tambah', 'tambahPenulis')->name('add');
            Route::match(['get', 'post'], '/{idPenulis}/ubah', 'ubahPenulis')->name('ubah');
            Route::delete('/{idPenulis}/hapus', 'hapusPenulis')->name('delete');
        });

    Route::controller(BukuController::class)
        ->prefix('buku')
        ->as('buku.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::get('/tabelBuku', 'tampilBuku')->name('tabel');
            Route::get('/{idBuku}/detail', 'detail')->name('detail');
            Route::get('/file/{idBuku}', 'bukaBuku')->name('file');
            // Route::post('/dataTable', 'BukuController@dataTable')->name('dataTable');
            Route::match(['get', 'post'], '/tambahBuku', 'tambahBuku')->name('add');
            Route::delete('/{idBuku}/hapus', 'hapusBuku')->name('hapus');
            Route::match(['get', 'post'], '{idBuku}/ubah', 'ubahBuku')->name('edit');
            //Route::delete('{idBuku}/hapus', 'hapusBuku')->name('delete');
        });

    Route::controller(GenreController::class, 'genre')
        ->prefix('genre')
        ->as('genre.')
        ->group(function () {
            // The 'genre.' prefix is automatically added to the route names
            Route::get('/', 'index')->name('index');
            Route::get('/{idGenre}/detail', 'detail')->name('detail');
            Route::match(['get', 'post'], '/add', 'tambahGenre')->name('add');
            Route::match(['get', 'post'], '/{id}/edit', 'ubahGenre')->name('edit');
            Route::delete('/{idGenre}/hapus', 'hapusGenre')->name('hapus');
        });

    Route::controller(PenerbitController::class)
        ->prefix('penerbit')
        ->as('penerbit.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/tabelPenerbit', 'tampilpenerbit')->name('tabel');
            Route::get('/penerbit/{id}', 'detail')->name('detail');

            // Route::post('/dataTable', 'BukuController@dataTable')->name('dataTable');
            Route::match(['get', 'post'], '/tambahPenerbit', 'tambahPenerbit')->name('add');
            Route::delete('{id}/buku/hapus/', 'hapusPenerbit')->name('hapus');
            Route::match(['get', 'post'], '{id}/ubahpenerbit', 'ubahPenerbit')->name('edit');
            //Route::delete('{id}/hapus', 'hapusBuku')->name('delete');
        });

    Route::controller(HistoryPeminjamanController::class)
        ->prefix('peminjaman')
        ->as('peminjaman.')
        ->group(function () {
            //Route::get('/', 'index')->name('index');
            Route::get('/tabelPeminjaman', 'tampilPeminjaman')->name('tabel');
            // Route::get('/penerbit/{id}', 'detail')->name('detail');
            Route::get('/export', 'export')->name('export');
            Route::post('/import', 'import')->name('import');
            // Route::post('/dataTable', 'BukuController@dataTable')->name('dataTable');
            // Route::match(['get', 'post'], '/tambahPenerbit', 'tambahPenerbit')->name('add');
            // Route::delete('{id}/buku/hapus/', 'hapusPenerbit')->name('hapus');
            // Route::match(['get', 'post'], '{id}/ubahpenerbit', 'ubahPenerbit')->name('edit');
            //Route::delete('{id}/hapus', 'hapusBuku')->name('delete');
        });

    Route::get('/etalaseBuku', [BukuController::class, 'etalaseBuku'])->name('etalaseBuku');        

});


