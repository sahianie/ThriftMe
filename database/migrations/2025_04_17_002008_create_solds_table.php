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
        Schema::create('solds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('thrift_id')->constrained()->onDelete('cascade');
            $table->string('username'); // User ka naam  
            $table->text('address')->nullable(); // Address optional hai  
            $table->decimal('total_amount', 10, 2)->nullable(); // Paisay optional  
            $table->string('contact', 20)->nullable(); // Contact optional

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solds');
    }
};
