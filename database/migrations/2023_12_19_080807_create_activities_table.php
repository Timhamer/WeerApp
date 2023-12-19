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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 255);
            $table->integer('duration');
            $table->string('location', 255);
            $table->unsignedBigInteger('repetition_id');
            $table->unsignedBigInteger('weather_id')->nullable();
            $table->timestamps();

            $table->foreign('repetition_id')
                ->references('id')
                ->on('repetitions')
                ->onDelete('cascade');
                
            $table->foreign('weather_id')
                ->references('id')
                ->on('weatherconditions')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
