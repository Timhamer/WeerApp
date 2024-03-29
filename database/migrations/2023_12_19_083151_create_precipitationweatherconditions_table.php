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
        Schema::create('precipitation_weather_condition', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('precipitation_id');
            $table->unsignedBigInteger('weather_condition_id');
            $table->timestamps();

            $table->foreign('precipitation_id')
                ->references('id')
                ->on('precipitations')
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
        Schema::dropIfExists('precipitationweatherconditions');
    }
};
