<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_sub_kelas_id_foreign');
            $table->dropColumn('sub_kelas_id');

            $table->unsignedBigInteger('kelas_id')->nullable();

            $table->foreign('kelas_id')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};