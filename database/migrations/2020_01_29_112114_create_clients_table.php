<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('toko_id');
            $table->string('user_nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('toko_id')->references('id')->on('toko');
        });

        DB::table('client')->insert([
            [
                'role_id' => 1,
                'toko_id' => 1,
                'user_nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin')
            ],
            [
                'role_id' => 2,
                'toko_id' => 1,
                'user_nama' => 'gudang1',
                'username' => 'gudang1',
                'password' => Hash::make('gudang1')
            ],
            [
                'role_id' => 2,
                'toko_id' => 2,
                'user_nama' => 'gudang2',
                'username' => 'gudang2',
                'password' => Hash::make('gudang2')
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
