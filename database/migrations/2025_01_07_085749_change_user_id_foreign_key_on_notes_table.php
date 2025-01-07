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
        // Drop the old foreign key
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drops the existing foreign key constraint
        });

        // Modify the foreign key to reference the 'my_users' table
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('my_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the new foreign key
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Revert to the old foreign key to 'users'
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};

