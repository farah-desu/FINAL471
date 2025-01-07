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
        Schema::create('music', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            // Foreign key constraint
            $table->foreign('id')
                  ->references('id')
                  ->on('features')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
