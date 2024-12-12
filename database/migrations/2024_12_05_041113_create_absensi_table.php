<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id');
            $table->foreignId('mata_pelajaran_id');

            $table->date('tanggal');
            $table->integer('jam_ke');

            $table->enum('status_kehadiran', ['hadir', 'sakit', 'izin', 'alfa']);
            $table->text('keterangan')->nullable();

            // $table->unsignedBigInteger('dicatat_oleh');

            $table->timestamps();

            // $table->foreign('siswa_id')
            //       ->references('id')
            //       ->on('siswas')
            //       ->onDelete('cascade');

            // $table->foreign('mata_pelajaran_id')
            //       ->references('id')
            //       ->on('mata_pelajarans')
            //       ->onDelete('cascade');

            // $table->foreign('dicatat_oleh')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');

            // $table->unique(['siswa_id', 'mata_pelajaran_id', 'tanggal', 'jam_ke']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
