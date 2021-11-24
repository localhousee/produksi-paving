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
            $table->string('ukuran', 45);
            $table->integer('harga');
            $table->string('deskripsi', 45);
            $table->string('satuan', 45);
            $table->string('gambar')->nullable();
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
