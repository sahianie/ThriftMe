<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('favouritable_id');
            $table->string('favouritable_type');
            $table->timestamps();
            $table->unique(['user_id', 'favouritable_id', 'favouritable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favourites');
    }
};
