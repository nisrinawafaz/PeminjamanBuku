<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;

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

Route::get('/etalaseBuku', [BukuController::class, 'etalaseBuku'])->name('etalaseBuku');

Route::group(['prefix' => 'dashboard/admin'], function () {
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
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get', 'post'], 'tambah', 'tambahAkun')->name('add');
            Route::match(['get', 'post'], '{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });

        Route::controller(BukuController::class)
            ->prefix('buku')
            ->as('buku.')
            ->group(function () {
                Route::get('/tabelBuku', 'tampilBuku')->name('tabel');
                Route::get('/buku/{id}', 'detail')->name('detail');
            Route::get('/file/{id}', 'bukaBuku')->name('file');
            // Route::post('/dataTable', 'BukuController@dataTable')->name('dataTable');
                Route::match(['get', 'post'], '/tambahBuku', 'tambahBuku')->name('add');
            Route::delete('{id}/buku/hapus/', 'hapusBuku')->name('hapus');
                Route::match(['get', 'post'], '{id}/ubah', 'ubahBuku')->name('edit');
                //Route::delete('{id}/hapus', 'hapusBuku')->name('delete');
            });

        Route::controller(GenreController::class)
            ->prefix('genre')
            ->as('genre.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::match(['get', 'post'], 'tambah', 'tambahGenre')->name('add');
                Route::match(['get', 'post'], '{id}/ubah', 'ubahGenre')->name('edit');
                Route::delete('{id}/hapus', 'hapusGenre')->name('delete');
            });
});
