<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('izin_gurus', function (Blueprint $table) {
        $table->string('nama')->after('guru_id');
        $table->string('mapel')->after('nama');
    });
}

public function down()
{
    Schema::table('izin_gurus', function (Blueprint $table) {
        $table->dropColumn(['nama', 'mapel']);
    });
}
};
