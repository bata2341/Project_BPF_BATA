<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->integer('tingkat');
            $table->foreignId('wali_kelas_id')->references('id')->on('users');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}