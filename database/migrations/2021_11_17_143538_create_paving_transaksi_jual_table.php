<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePavingTransaksiJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paving_transaksi_jual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paving_id')->constrained('paving');
            $table->foreignId('transaksi_jual_id')->constrained('transaksi_jual');
            $table->double('harga');
            $table->integer('qty');
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
        Schema::dropIfExists('paving_transaksi_jual');
    }
}
