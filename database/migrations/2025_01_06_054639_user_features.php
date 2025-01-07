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
        //
        Schema::create('user_features', function (Blueprint $table) {
            $table->id('user_id');
            $table->integer('feature_id');
            $table->primary(['user_id', 'feature_id']);
            $table->foreign('user_id')->references('id')->on('my_users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
