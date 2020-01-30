<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_toko');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('toko')->insert([
            ['nama_toko' => 'Erafone Pusat'],
            ['nama_toko' => 'Erafone Mall Olympic Garden'],
            ['nama_toko' => 'Erafone Megastore Suhat'],
            ['nama_toko' => 'Erafone Megastore MT Haryono']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toko');
    }
}
