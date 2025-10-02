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
        Schema::create('gurus_rekap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id');   // id guru (foreign key ke tabel guru)
            $table->unsignedBigInteger('siswa_id')->nullable(); // opsional, kalau mau catat siswa tertentu
            $table->string('foto')->nullable();
            $table->date('tanggal');
            $table->string('kelas')->nullable();
            $table->string('keterangan')->default('Hadir');
            $table->timestamps();

            // Relasi (opsional, sesuaikan dengan tabel guru/siswa yang kamu punya)
            // $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
            // $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus_rekap');
    }
};
