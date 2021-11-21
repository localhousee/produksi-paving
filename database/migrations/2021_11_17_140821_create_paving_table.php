<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePavingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paving', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 45);
            $table->integer('stok');
            $table->integer('stok_biji');
            $table->string('ukuran', 45);
            $table->double('harga_satuan');
            $table->string('deskripsi', 45);
            $table->string('satuan', 45);
            $table->string('gambar')->nullable();
            $table->integer('jumlah_per_palet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paving');
    }
}
