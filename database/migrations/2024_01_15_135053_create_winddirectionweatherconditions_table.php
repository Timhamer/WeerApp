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
        Schema::create('winddirectionweatherconditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('winddirection_id');
            $table->unsignedBigInteger('weathercondition_id');
            $table->timestamps();

            $table->foreign('winddirection_id')
                ->references('id')
                ->on('winddirection')
                ->onDelete('cascade');
                
            $table->foreign('weathercondition_id')
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
