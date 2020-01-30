<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerKurang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER tr_Kurang_Jumlah AFTER INSERT ON `Transaksi` FOR EACH ROW
            BEGIN
                UPDATE smartphone 
                SET jumlah = jumlah - NEW.jumlah
                WHERE id = NEW.smartphone_id;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Kurang_Jumlah`');
    }
}
