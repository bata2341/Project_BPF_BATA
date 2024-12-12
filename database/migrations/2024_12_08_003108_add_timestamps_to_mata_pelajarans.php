<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToMataPelajarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mata_pelajarans', function (Blueprint $table) {
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
        Schema::table('siswas', function (Blueprint $table) {
            $table->timestamps(); // Menghapus created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mata_pelajarans', function (Blueprint $table) {
            $table->dropTimestamps(); // Menghapus created_at dan updated_at
        });
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropTimestamps(); // Menghapus created_at dan updated_at
        });
    }
}
