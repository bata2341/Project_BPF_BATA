<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaranTable extends Migration
{
    public function up()
    {
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel', 10)->unique();
            $table->string('nama_mapel', 100);
            $table->foreignId('kelas_id');

            // $table->foreignId('kelas_id');
            // $table->foreignId('guru_id')->nullable();

            // $table->foreign('kelas_id')
            //       ->references('id')
            //       ->on('kelas')
            //       ->onDelete('cascade');

            // $table->foreign('guru_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};
