<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdForeignKeyOnTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            // Drop the old foreign key constraint if it exists
            $table->dropForeign(['user_id']); // Make sure to pass the correct column name

            // Add the new foreign key constraint (if necessary)
            $table->foreign('user_id')->references('id')->on('my_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            // Drop the foreign key and reset it back if you want to reverse the changes
            $table->dropForeign(['user_id']);

            // Optionally, re-add the old foreign key here if you want to roll back
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
