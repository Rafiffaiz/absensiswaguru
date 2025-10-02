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
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('nama');       // nama siswa
            $table->string('kelas');      // kelas siswa (X, XI, XII)
            $table->string('jurusan');    // jurusan siswa (RPL, TKJ, dll)
            $table->text('keterangan');   // alasan izin
            $table->date('tanggal');      // tanggal izin
            $table->timestamps();

            $table->foreign('siswa_id')
                  ->references('id')
                  ->on('siswas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
