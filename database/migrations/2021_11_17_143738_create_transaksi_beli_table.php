<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_beli', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota', 45);
            $table->date('tgl_transaksi');
            $table->string('total');
            $table->foreignId('supplier_id')->nullable()->constrained('supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_beli');
    }
}
