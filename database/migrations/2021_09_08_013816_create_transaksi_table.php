<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->integer('id_outlet');
            $table->char('kode_invoice');
            $table->string('nama');
            $table->dateTime('tgl_masuk');
            $table->dateTime('tgl_bayar')->nullable();
            $table->double('potongan')->nullable();
            $table->double('total_bayar')->nullable();
            $table->integer('id_status');
            $table->boolean('dibayar')->nullable();
            $table->integer('id_user');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
