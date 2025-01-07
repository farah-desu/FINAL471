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
        Schema::create('added_tos', function (Blueprint $table) {
            // Create columns for the composite primary key
            $table->unsignedBigInteger('cart_id'); 
            $table->unsignedBigInteger('product_id'); 

            // Set composite primary key
            $table->primary(['cart_id', 'product_id']);

            // Foreign key constraint
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');

            // Foreign key constraint
            $table->foreign('product_id')
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
        //
    }
};
