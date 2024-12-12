<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('name', 100);
            $table->enum('role', ['admin', 'guru', 'kepala_sekolah']);
            $table->foreignId('mata_pelajaran_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
