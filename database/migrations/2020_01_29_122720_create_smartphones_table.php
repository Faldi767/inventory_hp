<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartphone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('brand_id');
            $table->string('nama_smartphone');
            $table->integer('jumlah')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('brand_id')->references('id')->on('brand');
        });
        
        DB::table('smartphone')->insert([
            ['brand_id' => 1, 'nama_smartphone' => 'Redmi Note 8'],
            ['brand_id' => 2, 'nama_smartphone' => 'A9 2020'],
            ['brand_id' => 3, 'nama_smartphone' => 'S1 Pro'],
            ['brand_id' => 4, 'nama_smartphone' => 'X2 Pro'],
            ['brand_id' => 5, 'nama_smartphone' => 'ZenFone 6']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smartphone');
    }
}
