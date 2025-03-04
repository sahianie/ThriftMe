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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('rental_id')->constrained()->onDelete('cascade');
            $table->string('username'); // User ka naam, string theek hai  
            $table->text('address')->nullable(); // Address lamba bhi ho sakta hai, isliye text better hai  
            $table->date('start_date')->nullable(); // Date ke liye 'date' type best hai  
            $table->date('end_date')->nullable(); // End date bhi date type honi chahiye  
            $table->integer('total_days')->nullable(); // Days ka count integer mein store hoga  
            $table->decimal('total_amount', 10, 2)->nullable(); // Paisay decimal format mein store honge  
            $table->string('contact', 20)->nullable(); // Phone number ya contact, max length set kar di  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
