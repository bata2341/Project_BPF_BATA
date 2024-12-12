<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAktivitasTable extends Migration
{
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->string('aktivitas', 255);
            $table->text('deskripsi')->nullable();
            $table->string('ip_address', 45)->nullable();

            $table->timestamps();

            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
