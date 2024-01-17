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
        Schema::create('weather_condition_wind_direction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wind_direction_id');
            $table->unsignedBigInteger('weather_condition_id');
            $table->timestamps();

            $table->foreign('wind_direction_id')
                ->references('id')
                ->on('wind_directions')
                ->onDelete('cascade');
                
            $table->foreign('weather_condition_id')
                ->references('id')
                ->on('weatherconditions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winddirectionweatherconditions');
    }
};
