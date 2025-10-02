<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('izins', function (Blueprint $table) {
            if (!Schema::hasColumn('izins', 'guru_id')) {
                $table->unsignedBigInteger('guru_id')->nullable()->after('id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('izins', function (Blueprint $table) {
            $table->dropColumn('guru_id');
        });
    }
};
