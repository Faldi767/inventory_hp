<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('toko_id');
            $table->unsignedInteger('smartphone_id');
            $table->integer('jumlah');
            $table->string('bukti')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('toko_id')->references('id')->on('toko');
            $table->foreign('smartphone_id')->references('id')->on('smartphone');
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
