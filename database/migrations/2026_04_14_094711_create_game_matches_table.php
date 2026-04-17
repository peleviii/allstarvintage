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
        Schema::create('game_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_home_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team_away_id')->constrained('teams')->onDelete('cascade');
            $table->integer('sets_home')->nullable();
            $table->integer('sets_away')->nullable();
            $table->enum('day', ['1', '2', '3']);
            $table->boolean('played')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_matches');
    }
};
