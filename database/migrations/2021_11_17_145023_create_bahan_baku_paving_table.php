<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakuPavingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku_paving', function (Blueprint $table) {
            $table->foreignId('paving_id')->constrained('paving')->cascadeOnDelete();
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku')->cascadeOnDelete();
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_baku_paving');
    }
}
