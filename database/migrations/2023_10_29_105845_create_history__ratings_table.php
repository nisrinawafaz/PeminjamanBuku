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
        Schema::create('history__ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idBuku');
            $table->unsignedBigInteger('idUser');
            $table->integer('nilai_rating');
            $table->text('ulasan');
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
        Schema::dropIfExists('history__ratings');
    }
};
