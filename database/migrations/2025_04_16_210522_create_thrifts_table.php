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
        Schema::create('thrifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string('title')->nullable();
            $table->enum('size', ['small', 'medium', 'large'])->nullable();
            $table->string('material')->nullable();
            $table->string('condition')->nullable();
            $table->enum('type', ['men', 'women', 'kid'])->nullable();
            $table->decimal('price', 8, 2)->nullable(); // Assuming you want a price field for thrifts
            $table->enum('status', ['Available', 'Sold'])->default('Available'); // You might use 'Sold' instead of 'Booked' for thrift items
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thrifts');
    }
};
