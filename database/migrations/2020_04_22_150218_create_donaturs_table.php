<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->Integer('id_donatur');
            $table->BigInteger('id_jenisDonatur')->references('id_jenisDonatur')->on('departments')->onDelete('restrict');
            $table->string('nama_donatur');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donaturs');
    }
}
