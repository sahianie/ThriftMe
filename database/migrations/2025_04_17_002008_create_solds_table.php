<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('solds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('thrift_id')->constrained()->onDelete('cascade');
            $table->string('username');
            $table->text('address')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('contact', 11)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solds');
    }
};
