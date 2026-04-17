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
    Schema::table('game_matches', function (Blueprint $table) {
        $table->string('match_time')->nullable()->after('day');
        $table->string('match_label')->nullable()->after('match_time');
    });
}

public function down(): void
{
    Schema::table('game_matches', function (Blueprint $table) {
        $table->dropColumn(['match_time', 'match_label']);
    });
}
};
