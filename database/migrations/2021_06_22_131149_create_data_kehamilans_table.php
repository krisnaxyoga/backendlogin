<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKehamilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kehamilans', function (Blueprint $table) {
            $table->id();
            $table->string('tempatpelayanan');
            $table->string('tanggal');
            $table->string('uk');
            $table->string('beratbadan');
            $table->integer('td');
            $table->integer('lila');
            $table->integer('tinggi_fundus');
            $table->integer('letakjanin');
            $table->string('tablettambahdarah');
            $table->string('laboratorium');
            $table->string('tatalaksana');
            $table->string('konseling');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kehamilans');
    }
}
