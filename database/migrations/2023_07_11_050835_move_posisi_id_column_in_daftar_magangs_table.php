<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovePosisiIdColumnInDaftarMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{ Schema::table('daftar_magangs', function (Blueprint $table) {
    $table->BigInteger('posisi_id')->nullable()->after('nama'); });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_magangs', function (Blueprint $table) {
        Schema::dropIfExists('posisi');
        });
    }
}
