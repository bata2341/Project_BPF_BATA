<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

class CreateSiswaTable extends Migration
{
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20)->unique();
            $table->string('nama', 100);

            $table->foreignId('kelas_id');
            $table->enum('jenis_kelamin', ['L', 'P']);

            $table->text('alamat')->nullable();
            $table->string('nama_orangtua', 100)->nullable();
            $table->string('telepon_orangtua', 20)->nullable();

            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');

            // $table->foreign('kelas_id')
            //       ->references('id')
            //       ->on('kelas')
            //       ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
