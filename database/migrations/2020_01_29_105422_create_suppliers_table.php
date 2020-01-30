<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_supplier');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('supplier')->insert([
            ['nama_supplier' => 'PT. Xiaomi Indonesia'],
            ['nama_supplier' => 'PT. OPPO Indonesia'],
            ['nama_supplier' => 'PT. Vivo Indonesia'],
            ['nama_supplier' => 'PT. Realme Indonesia'],
            ['nama_supplier' => 'PT. ASUS Indonesia'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
