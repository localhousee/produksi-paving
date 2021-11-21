<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePavingHasBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paving_has_bahan_baku', function (Blueprint $table) {
            $table->foreignId('paving_id')->constrained('paving');
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku');
            $table->integer('jumlah_paving_per_bahanbaku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paving_has_bahan_baku');
    }
}
