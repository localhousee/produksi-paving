<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_jual', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota', 45);
            $table->date('tgl_transaksi');
            $table->string('bayar', 45);
            $table->string('total');
            $table->string('status', 45);
            $table->foreignId('pembeli_id')->nullable()->constrained('pembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_jual');
    }
}
