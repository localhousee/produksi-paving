<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiHasPavingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_has_paving', function (Blueprint $table) {
            $table->foreignId('produksi_id')->constrained('produksi');
            $table->foreignId('paving_id')->constrained('paving');
            $table->integer('jumlah_produksi');
            $table->double('jumlah_bahanbaku_dipakai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksi_has_paving');
    }
}
