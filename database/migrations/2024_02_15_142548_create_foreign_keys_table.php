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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
        Schema::table('locations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foreign_key', function (Blueprint $table) {
            //
        });
    }
};
