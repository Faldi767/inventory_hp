<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_brand');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('brand')->insert([
            ['nama_brand' => 'Xiaomi'],
            ['nama_brand' => 'OPPO'],
            ['nama_brand' => 'Vivo'],
            ['nama_brand' => 'Realme'],
            ['nama_brand' => 'ASUS']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
}
