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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('alamat');
            $table->string('nohp');
            $table->integer('semester');
            $table->unsignedBigInteger('id_gol');
            $table->foreign('id_gol')->references('id')->on('golongan')->onDelete('cascade');
            $table->primary('nim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
