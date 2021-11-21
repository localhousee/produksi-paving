<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakuTransaksiBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku_transaksi_beli', function (Blueprint $table) {
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku');
            $table->foreignId('transaksi_beli_id')->constrained('transaksi_beli');
            $table->double('harga');
            $table->double('qty');
            $table->double('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_baku_transaksi_beli');
    }
}
