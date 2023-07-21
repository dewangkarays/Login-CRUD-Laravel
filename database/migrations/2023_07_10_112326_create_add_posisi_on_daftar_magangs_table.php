<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPosisiOnDaftarMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_magangs', function (Blueprint $table) {
           
            $table->bigInteger('posisi')->nullable()->after('nama');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_magangs', function (Blueprint $table){
        $table->$table->dropColumn('posisi');
    });
    }
}
