<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang_beli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_beli_id')->nullable()->constrained('transaksi_beli');
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku');
            $table->integer('qty');
            $table->integer('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang_beli');
    }
}
