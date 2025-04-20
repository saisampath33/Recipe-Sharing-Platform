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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // This creates a BIGINT UNSIGNED PRIMARY KEY
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // Optional image
            $table->string('cuisine')->nullable();
            $table->string('difficulty')->nullable();
            $table->text('ingredients'); // stored as plain text or comma-separated string
            $table->timestamps();

            // Foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
