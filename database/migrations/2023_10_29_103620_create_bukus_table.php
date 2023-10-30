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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('idBuku');
            $table->unsignedBigInteger('idPenulis');
            $table->unsignedBigInteger('idPenerbit');
            $table->unsignedBigInteger('idGenre');
            $table->string('judul');
            $table->integer('tahun_terbit');
            $table->text('deskripsi');
            $table->string('path_file');
            $table->integer('stok');
            $table->integer('harga_harian');
            $table->string('gambar_cover');
            $table->timestamps();

            
            $table->foreign('idPenulis')->references('idPenulis')->on('penulis')->onDelete('cascade');
            $table->foreign('idPenerbit')->references('idPenerbit')->on('penerbits')->onDelete('cascade');
            $table->foreign('idGenre')->references('idGenre')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};
