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
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('brand_id')->references('id')->on('brand');
        });

        DB::table('smartphone')->insert(
            array(
                'brand_id' => 1,
                'nama_smartphone' => 'Note 8'
            )
        );
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
