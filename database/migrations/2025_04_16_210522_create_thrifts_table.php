<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

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
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('status', ['Available', 'Sold'])->default('Available');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thrifts');
    }
};
