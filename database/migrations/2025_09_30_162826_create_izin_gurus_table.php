<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('izin_gurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id');   // relasi ke tabel guru
            $table->text('keterangan');              // alasan izin
            $table->date('tanggal');                 // tanggal izin
            $table->timestamps();

            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('izin_gurus');
    }
};
