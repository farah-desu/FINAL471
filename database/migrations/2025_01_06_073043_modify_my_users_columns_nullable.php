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
        Schema::table('my_users', function (Blueprint $table) {
            // Make current_quote, current_auth, and current_music nullable
            $table->string('current_quote')->nullable()->change();
            $table->string('current_auth')->nullable()->change();
            $table->string('current_music')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_users', function (Blueprint $table) {
            // Make columns not nullable again
            $table->string('current_quote')->nullable(false)->change();
            $table->string('current_auth')->nullable(false)->change();
            $table->string('current_music')->nullable(false)->change();
        });
    }
};

