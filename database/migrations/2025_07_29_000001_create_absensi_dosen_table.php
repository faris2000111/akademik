<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi_dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->timestamp('waktu');
            $table->timestamps();
            
            $table->foreign('nip')->references('nip')->on('dosen')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi_dosen');
    }
}; 