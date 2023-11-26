<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_peminjaman', function (Blueprint $table) {
            $table->id('idPeminjaman');
            $table->unsignedBigInteger('idBuku');
            $table->unsignedBigInteger('idUser');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->integer('total_pembayaran');
            $table->timestamps();

            $table->foreign('idBuku')->references('idBuku')->on('bukus')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_peminjaman');
    }
};
