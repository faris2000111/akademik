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
        Schema::create('jadwal_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('kode_mk');
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_gol');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
            $table->foreign('id_gol')->references('id')->on('golongan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_akademik');
    }
};
