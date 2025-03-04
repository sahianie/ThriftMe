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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string('title')->nullable();
            $table->enum('size', ['small', 'medium', 'large'])->nullable();
            $table->string('material')->nullable();
            $table->string('condition')->nullable();
            $table->enum('type', ['men', 'women', 'kid'])->nullable();
            $table->decimal('rent_per_day',6,2)->nullable();
            $table->enum('status', ['Available', 'Booked'])->default('Available');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
